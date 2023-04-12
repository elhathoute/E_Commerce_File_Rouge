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
        Schema::create('color_size', function (Blueprint $table) {
            $table->id();
                $table->foreignId('color_id')->constrained()->onDelete('cascade');
                $table->foreignId('size_id')->constrained()->onDelete('cascade');
                $table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->integer('quantity');
                $table->decimal('price', 8, 2);
                $table->integer('offer');
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
        Schema::dropIfExists('color_size');
    }
};
