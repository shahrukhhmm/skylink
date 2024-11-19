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
        Schema::create('parking_pricings', function (Blueprint $table) {
            $table->id();
            $table->string('airport_parking_id')->nullable();
            $table->string('oneDay')->nullable();
            $table->string('weekly')->nullable();
            $table->string('monthly')->nullable();
            $table->string('car_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_pricings');
    }
};
