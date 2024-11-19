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
        Schema::create('airport_parkings', function (Blueprint $table) {
            $table->id();
            $table->string('city_id')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('location')->nullable();
            $table->string('logo')->nullable();
            $table->string('points')->nullable();
            $table->string('price')->nullable();
            $table->string('days')->nullable();
            $table->text('extra_json')->nullable();
            $table->string('status')->nullable();
            $table->string('last_time_booked')->nullable();
            $table->text('summary_overview')->nullable();
            $table->text('on_arrival')->nullable();
            $table->text('on_return')->nullable();
            $table->text('important')->nullable();
            $table->text('reviews')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airport_parkings');
    }
};
