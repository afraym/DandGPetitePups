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
        Schema::create('puppies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->decimal('price');
            $table->decimal('discountPrice')->nullable();
            $table->text('puppyDescHtml')->nullable();
            $table->text('shortDescHtml')->nullable();
            $table->integer('breed_id');
            $table->text('videoPreview')->nullable();
            $table->integer('status')->default(1);
            $table->integer('featured')->default(0);
            $table->integer('impression')->default(0);
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('puppies', function (Blueprint $table) {
        //     $table->dropForeign('user_id');
        // });
        
        // Schema::table('puppy_details', function (Blueprint $table) {
        //     $table->dropForeign('puppy_id');
        // });
        // Schema::table('puppy_images', function (Blueprint $table) {
        //     $table->dropForeign('puppy_id');
        // });
        // Schema::dropIfExists('questions');
        Schema::dropIfExists('puppies');
        // Schema::dropIfExists('users');
    }
};
