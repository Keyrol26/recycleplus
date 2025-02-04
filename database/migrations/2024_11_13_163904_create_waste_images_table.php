<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('waste_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'booking_id');
            $table->string('recycle_image');
            $table->string(column: 'validation_status')->nullable();
            $table->string(column: 'prediction')->nullable();
            $table->float(column: 'confidence')->nullable();
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('waste_images');
    }
};
