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
        Schema::create('waste_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'booking_id');
            $table->boolean('paper');
            $table->boolean('plastic');
            $table->boolean('electronic');
            $table->boolean('aluminium');
            $table->boolean('steel');
            $table->boolean('cardboard');
            $table->boolean('textiles');
            $table->boolean('metal');
            $table->boolean('glass');
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('waste_categories');
    }
};
