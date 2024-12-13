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
        Schema::create('puppy_images', function (Blueprint $table) {
            $table->id();
            $table->integer('puppy_id');
            $table->string('name');
            $table->string('link');
            $table->string('path');
            $table->integer('priority');
            $table->string('nameWithoutExt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('puppy_images', function (Blueprint $table) {
        // $table->dropForeign('puppy_id');
        // });
        
        Schema::dropIfExists('puppy_images');
    }
};
