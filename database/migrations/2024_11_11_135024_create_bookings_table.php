<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('airport_id')->nullable();
            $table->string('dropoff_date')->nullable();
            $table->string('dropoff_time')->nullable();
            $table->string('pickup_date')->nullable();
            $table->string('pickup_time')->nullable();
            $table->string('voucher')->nullable();
            $table->string('email')->nullable();
            $table->string('fullName')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->string('registration')->nullable();
            $table->string('passengers')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('colour')->nullable();
            $table->string('terminalOut')->nullable();
            $table->string('outboundFlightNumber')->nullable();
            $table->string('terminalIn')->nullable();
            $table->string('inboundFlightNumber')->nullable();
            $table->string('booking_payment')->nullable();
            $table->string('total_payment')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
