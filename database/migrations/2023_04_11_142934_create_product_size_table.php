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
        // Schema::create('product_size_color', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('product_id');
        //     $table->unsignedBigInteger('size_id');
        //     $table->unsignedBigInteger('color_id');
        //     $table->integer('qte');
        //     $table->timestamps();

        //     $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        //     $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
        //     $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
        // });

        // Schema::create('color_product_size', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('product_id');
        //     $table->unsignedBigInteger('size_id');

        //     $table->timestamps();

        //     $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        //     $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_size');
    }
};
