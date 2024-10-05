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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryID');
            $table->string('name', 250);
            $table->string('cpu', 250)->nullable();
            $table->string('ram', 250)->nullable();
            $table->string('storage', 250)->nullable();
            $table->string('screen', 250)->nullable();
            $table->string('card', 250)->nullable();
            $table->string('connector', 300)->nullable();
            $table->string('weight', 150)->nullable();
            $table->string('keyboard', 150)->nullable();
            $table->string('battery', 150)->nullable();
            $table->string('os', 150)->nullable();
            $table->string('warranty', 50)->nullable();
            $table->string('color', 50)->nullable();
            $table->string('material', 150)->nullable();
            $table->text('description')->nullable();
            $table->double('price');
            $table->integer('stock');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('categoryID')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
