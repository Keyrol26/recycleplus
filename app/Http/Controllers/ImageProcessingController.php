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
    // <!--Process Method --!>
    // public function classifyImage(Request $request, $imageId)
    // {
    //     $imageRelativePath = DB::table('waste_images')->where('id', $imageId)->value('recycle_image');

    //     if (!$imageRelativePath) {
    //         return response()->json(['error' => 'Image not found'], 404);
    //     }

    //     // Get the full path to the uploaded image
    //     $fullImagePath = storage_path('app/public/' . $imageRelativePath);


    //     // // Python executable and script paths
    //     $pythonExecutable = 'C:\Users\khais\AppData\Local\Programs\Python\Python310\python.exe'; // Path to Python
    //     $pythonScriptPath = base_path('img_processing/script/app.py');  // Correct path to Python script

    //     // Set environment variables to avoid Python hash issue
    //     putenv('PYTHONHASHSEED=0');
    //     putenv('TF_ENABLE_ONEDNN_OPTS=0'); // For TensorFlow

    //     // Create a new process
    //     $process = new Process([
    //         $pythonExecutable,
    //         $pythonScriptPath,
    //         $fullImagePath
    //     ]);

    //     // Set environment variables to fix the "Could not determine home directory" issue
    //     $process->setEnv([
    //         'HOME' => getenv('USERPROFILE') ?: getenv('HOMEDRIVE') . getenv('HOMEPATH'),
    //         'USERPROFILE' => getenv('USERPROFILE') ?: getenv('HOMEDRIVE') . getenv('HOMEPATH'),
    //         'TF_ENABLE_ONEDNN_OPTS' => '0',  // Ensure TensorFlow's flag is set in the process environment
    //     ]);
    //     // Run the process
    //     $process->run();

    //     // Run the process and check if it is successful
    //     try {
    //         $process->mustRun(); // Will throw an exception if the process fails

    //         // Capture the output from the Python script (JSON formatted)
    //         $output = $process->getOutput();

    //         // Clean the output (remove unwanted characters before JSON)
    //         preg_match('/\{.*\}/', $output, $matches);

    //         // Check if the JSON pattern is matched
    //         if (empty($matches)) {
    //             return response()->json(['error' => 'Failed to extract JSON from output'], 500);
    //         }

    //         // Decode the JSON
    //         $data = json_decode($matches[0], true);

    //         // Check if decoding was successful
    //         if ($data === null) {
    //             return response()->json(['error' => 'Failed to decode JSON output'], 500);
    //         }

    //         // dd($data);
    //         // Fetch specific values from the JSON
    //         $status = $data['status'];
    //         $prediction = $data['prediction'];
    //         $confidence = $data['confidence'];

    //         $waste = WasteImages::findOrFail($imageId);

    //         $waste->update([
    //             'validation_status' => $status,
    //             'prediction' => $prediction,
    //             'confidence' => $confidence,
    //             'updated_at' => now(),
    //         ]);
    //         switch ($status) {
    //             case 'Valid':
    //                 $bookingstatus = "Pending";
    //                 break;

    //             case 'Invalid':
    //                 $bookingstatus = "Rejected";
    //                 break;
    //         }
    //         $bookingid = WasteImages::findOrFail($imageId);
    //         $booking = Booking::findOrFail($bookingid->booking_id);
    //         // dd($booking);
    //         $booking->update([
    //             'status' => $bookingstatus,
    //             'updated_at' => now(),
    //         ]);

    //     } catch (ProcessFailedException $e) {
    //         // If the process fails, catch the exception and return the error message
    //         dd($e->getMessage());
    //         return back()->with('message', ' Images validation processed Failed.')->with('message_type', 'warning');
    //         // return back()->with('message', $e->getMessage())->with('message_type', 'warning');
    //     }

    //     return back()->with('message', ' Images validation processed successfully.')->with('message_type', 'success');

    // }


    // public function validateAllUnvalidatedImages()
    // {
    //     // Fetch all unvalidated images
    //     $unvalidatedImages = WasteImages::where('validation_status', null) // Adjust based on your DB status
    //         ->get();

    //     // dd($unvalidatedImages);

    //     // Check if there are any unvalidated images
    //     if ($unvalidatedImages->isEmpty()) {
    //         // return back()->with(compact('msg'));
    //         return back()->with('message', 'No unvalidated images found.')->with('message_type', 'info');
    //     }

    //     // Loop through each unvalidated image
    //     foreach ($unvalidatedImages as $waste) {
    //         // Get the full path to the uploaded image
    //         $fullImagePath = storage_path('app/public/' . $waste->recycle_image);

    //         // Python executable and script paths
    //         $pythonExecutable = 'C:\Users\khais\AppData\Local\Programs\Python\Python310\python.exe'; // Path to Python
    //         $pythonScriptPath = base_path('img_processing/script/app.py');  // Correct path to Python script

    //         // Set environment variables (Prevents hash issues in Windows)
    //         putenv('PYTHONHASHSEED=0');
    //         putenv('TF_ENABLE_ONEDNN_OPTS=0');
    //         // Create a new process for each image
    //         $process = new Process([
    //             $pythonExecutable,
    //             $pythonScriptPath,
    //             $fullImagePath
    //         ]);

    //         $process->setEnv([
    //             'HOME' => getenv('USERPROFILE') ?: getenv('HOMEDRIVE') . getenv('HOMEPATH'),
    //             'USERPROFILE' => getenv('USERPROFILE') ?: getenv('HOMEDRIVE') . getenv('HOMEPATH'),
    //             'TF_ENABLE_ONEDNN_OPTS' => '0',  // TensorFlow optimization flag
    //         ]);

    //         // Run the process
    //         try {
    //             $process->mustRun(); // Will throw an exception if the process fails

    //             // Capture the output from the Python script (JSON formatted)
    //             $output = $process->getOutput();

    //             // Clean the output (remove unwanted characters before JSON)
    //             preg_match('/\{.*\}/', $output, $matches);

    //             if (empty($matches)) {
    //                 continue; // Skip this image if the output is not valid
    //             }

    //             // Decode the JSON output
    //             $data = json_decode($matches[0], true);
    //             if ($data === null) {
    //                 continue; // Skip if JSON decoding fails
    //             }

    //             // Fetch specific values from the JSON output
    //             $status = $data['status'];
    //             $prediction = $data['prediction'];
    //             $confidence = $data['confidence'];

    //             // Update the waste image with classification results
    //             $waste->update([
    //                 'validation_status' => $status,
    //                 'prediction' => $prediction,
    //                 'confidence' => $confidence,
    //                 'updated_at' => now(),
    //             ]);

    //             // Determine booking status based on validation result
    //             switch ($status) {
    //                 case 'Valid':
    //                     $bookingstatus = "Pending";
    //                     break;
    //                 case 'Invalid':
    //                     $bookingstatus = "Rejected";
    //                     break;
    //                 default:
    //                     $bookingstatus = "Processing"; // Default fallback
    //                     break;
    //             }

    //             // Update the related booking record
    //             $booking = Booking::find($waste->booking_id);
    //             if ($booking) {
    //                 $booking->update([
    //                     'status' => $bookingstatus,
    //                     'updated_at' => now(),
    //                 ]);
    //             }

    //         } catch (ProcessFailedException $e) {
    //             // Handle process failure
    //             continue; // Skip this image and move to the next one
    //         }
    //     }
    //     // $msg = 'All unvalidated images processed successfully.';
    //     return back()->with('message', 'All unvalidated images processed successfully.')->with('message_type', 'success');

    // }



    // <!--Exec() Method --!>
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
        $pythonExecutable = 'C:\\Users\\khais\\AppData\\Local\\Programs\\Python\\Python310\\python.exe';
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

            $pythonExecutable = 'C:\Users\khais\AppData\Local\Programs\Python\Python310\python.exe';
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
