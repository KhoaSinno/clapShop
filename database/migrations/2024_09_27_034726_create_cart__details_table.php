<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart__details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cartID');
            $table->unsignedBigInteger('productID');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('cartID')->references('id')->on('carts');
            $table->foreign('productID')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart__details');
    }
};
