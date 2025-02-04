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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('collector_id')->nullable();
            $table->string('pickup_id');
            $table->string('name');
            $table->string('status')->default('Processing');
            $table->string('pickup_status')->nullable();
            $table->string('phoneno')->limit(10);
            $table->string('alt_phoneno')->nullable()->limit(10);
            $table->string('est_weight');
            $table->text('note')->nullable();
            $table->date('pickup_date');
            $table->string('pickup_time');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('collector_id')->references('id')->on('collectors')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_services');
    }
};
