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
        Schema::create('product__images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productID');
            $table->string('image_url', 255);
            $table->string('type', 50);
            $table->timestamps();

            $table->foreign('productID')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product__images');
    }
};
