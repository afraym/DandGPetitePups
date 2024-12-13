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
        Schema::create('puppy_details', function (Blueprint $table) {
            $table->id();
            $table->integer('puppy_id');
            $table->string('Gender')->nullable();
            $table->string('Size')->nullable();
            $table->string('Birth_Date')->nullable();
            $table->string('Color')->nullable();
            $table->string('Photo_Date')->nullable();
            $table->string('Available_From')->nullable();
            $table->string('Available_To')->nullable();
            $table->string('Champion_Bloodlines')->nullable();
            $table->string('Champion_Sired')->nullable();
            $table->string('Vaccinations_And_Dewormings')->nullable();
            $table->string('Health_Certificate')->nullable();
            $table->string('Health_Record')->nullable();
            $table->string('Health_Warranty')->nullable();
            $table->integer('location')->nullable();
            // $table->string('name')->nullable();
            // $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puppy_details');
    }
};
