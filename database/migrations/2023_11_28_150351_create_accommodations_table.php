<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['hotel', 'apartment']);
            $table->text('description');
            $table->string('transport');
            $table->string('distance_from_beach');
            // Add other fields as needed

            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('accommodations');
    }
};
