<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('hotel');
            $table->integer('rating'); // Adjust based on your rating scale
            $table->string('image_url')->nullable();
            $table->string('name');
            $table->enum('status', ['approved', 'not approved'])->default('not approved');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};
