<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips');
            $table->unsignedBigInteger('requester_id');
            $table->foreign('requester_id')->references('id')->on('users');
            $table->string('request_name');
            $table->string('request_category');
            $table->string('request_brand');
            $table->string('request_description');
            $table->string('request_image');
            $table->integer('request_price');
            $table->integer('request_price_ppn')->nullable();
            $table->integer('request_price_pabean')->nullable();
            $table->integer('request_quantity');
            $table->integer('request_weight');
            $table->integer('request_tax');
            $table->string('request_status')->default("waiting approval");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests_item');
    }
};
