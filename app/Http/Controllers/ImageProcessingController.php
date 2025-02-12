<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WasteImages;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Log;
class ImageProcessingController extends Controller
{
    public function classifyImage(Request $request, $imageId)
    {
        // Retrieve image path from the database
        $imageRelativePath = DB::table('waste_images')->where('id', $imageId)->value('recycle_image');

        if (!$imageRelativePath) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        // Convert to full image path (Ensure correct Windows-style paths)
        $fullImagePath = str_replace('/', '\\', storage_path('app/public/' . $imageRelativePath));

        // Python executable and script path
        $pythonExecutable = 'C:\\Users\\Your_Name\\AppData\\Local\\Programs\\Python\\Python310\\python.exe';
        $pythonScriptPath = base_path('img_processing/script/app.py');

        // Set environment variables (Prevents hash issues in Windows)
        putenv('PYTHONHASHSEED=0');
        putenv('TF_ENABLE_ONEDNN_OPTS=0');

        // Build the command for execution
        $command = "\"$pythonExecutable\" \"$pythonScriptPath\" \"$fullImagePath\" 2>&1";

        // Execute Python script
        exec($command, $output, $returnVar);

        // Log the raw output for debugging
        Log::info("Python script output: " . implode("\n", $output));

        // Check if execution was successful
        if ($returnVar !== 0) {
            Log::error("Python script execution failed: " . implode("\n", $output));
            return response()->json(['error' => 'Image classification failed.'], 500);
        }

        // Extract JSON response from Python output
        $jsonOutput = implode("\n", $output);
        preg_match('/\{.*\}/s', $jsonOutput, $matches);

        if (empty($matches)) {
            Log::error("Invalid response from Python script: " . $jsonOutput);
            return response()->json(['error' => 'Invalid response from classifier'], 500);
        }

        // Decode JSON
        $data = json_decode($matches[0], true);

        if (!$data) {
            Log::error("JSON decoding failed: " . json_last_error_msg());
            return response()->json(['error' => 'Error parsing classifier response'], 500);
        }

        // Extract classification details
        $status = $data['status'] ?? null;
        $prediction = $data['prediction'] ?? null;
        $confidence = $data['confidence'] ?? null;

        if (!$status || !$prediction || !$confidence) {
            Log::error("Missing classification details in response: " . json_encode($data));
            return response()->json(['error' => 'Incomplete classifier response'], 500);
        }

        // Update waste image classification
        $waste = WasteImages::findOrFail($imageId);
        $waste->update([
            'validation_status' => $status,
            'prediction' => $prediction,
            'confidence' => $confidence,
            'updated_at' => now(),
        ]);

        // Determine booking status
        $bookingStatus = ($status === 'Valid') ? "Pending" : "Rejected";

        // Update the related booking record
        $booking = Booking::findOrFail($waste->booking_id);
        $booking->update([
            'status' => $bookingStatus,
            'updated_at' => now(),
        ]);

        return back()->with('message', 'Images validation processed successfully.')->with('message_type', 'success');
    }

    public function validateAllUnvalidatedImages()
    {
        ini_set('max_execution_time', 600); // Extend execution time
        // Fetch all unvalidated images
        $unvalidatedImages = WasteImages::where('validation_status', null) // Adjust based on your DB status
            ->get();

        if ($unvalidatedImages->isEmpty()) {
            return back()->with('message', 'No unvalidated images found.')->with('message_type', 'info');
        }

        foreach ($unvalidatedImages as $waste) {
            $fullImagePath = storage_path('app/public/' . $waste->recycle_image);

            $pythonExecutable = 'C:\Users\Your_Name\AppData\Local\Programs\Python\Python310\python.exe';
            $pythonScriptPath = base_path('img_processing/script/app.py');

            putenv('PYTHONHASHSEED=0');
            putenv('TF_ENABLE_ONEDNN_OPTS=0');

            // Construct the command to execute
            $command = escapeshellcmd("$pythonExecutable $pythonScriptPath $fullImagePath");

            // Execute the command and capture output
            $output = shell_exec($command);

            // Clean the output (extract JSON part)
            preg_match('/\{.*\}/', $output, $matches);

            if (empty($matches)) {
                continue;
            }

            $data = json_decode($matches[0], true);
            if ($data === null) {
                continue;
            }

            $status = $data['status'];
            $prediction = $data['prediction'];
            $confidence = $data['confidence'];

            // Update the waste image record
            $waste->update([
                'validation_status' => $status,
                'prediction' => $prediction,
                'confidence' => $confidence,
                'updated_at' => now(),
            ]);

            // Determine booking status
            $bookingstatus = match ($status) {
                'Valid' => 'Pending',
                'Invalid' => 'Rejected',
                default => 'Processing',
            };

            $booking = Booking::find($waste->booking_id);
            if ($booking) {
                $booking->update([
                    'status' => $bookingstatus,
                    'updated_at' => now(),
                ]);
            }
        }

        return back()->with('message', 'All unvalidated images processed successfully.')->with('message_type', 'success');
    }

}
