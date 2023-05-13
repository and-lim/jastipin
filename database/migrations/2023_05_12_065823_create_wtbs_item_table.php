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
        Schema::create('wtbs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('wtb_name');
            $table->string('wtb_location');
            $table->integer('wtb_price');
            $table->integer('wtb_weight');
            $table->integer('wtb_amount');
            $table->string('wtb_image');
            $table->string('wtb_description');
            $table->string('wtb_status') ->default("published");
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
        Schema::dropIfExists('wtb_items');
    }
};
