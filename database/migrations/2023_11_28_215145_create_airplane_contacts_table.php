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
        Schema::create('airplane_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('status', ['contacted', 'not contacted'])->default('not contacted');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('airplane_contacts');
    }
};
