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
        Schema::create('offer_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('nights');
            $table->decimal('price_per_night', 10, 2);
            // Add other fields as needed

            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('offer_prices');
    }
};
