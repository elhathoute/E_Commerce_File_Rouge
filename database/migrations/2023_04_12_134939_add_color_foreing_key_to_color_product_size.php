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
        // Schema::table('color_product_size', function (Blueprint $table) {
        //      $table->unsignedBigInteger('color_id');
        //      $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');


        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('color_product_size', function (Blueprint $table) {
            //
        });
    }
};
