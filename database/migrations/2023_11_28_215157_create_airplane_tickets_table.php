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
        Schema::create('airplane_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_type');
            $table->string('from_destination');
            $table->string('to_destination');
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('adults');
            $table->integer('kids');
            $table->integer('babies');
            $table->string('class');
            $table->unsignedBigInteger('contact_id')->nullable(); // Foreign key
            $table->foreign('contact_id')->references('id')->on('airplane_contacts')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('airplane_tickets');
    }
};
