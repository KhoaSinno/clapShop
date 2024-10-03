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
            $table->string('name', 100);
            $table->string('cpu', 100);
            $table->string('ram', 100);
            $table->string('storage', 100);
            $table->string('screen', 150);
            $table->string('card', 150);
            $table->string('connector', 300);
            $table->string('weight', 50);
            $table->string('keyboard', 50);
            $table->string('battery', 100);
            $table->string('os', 100);
            $table->string('warranty', 50);
            $table->string('color', 50);
            $table->string('material', 150);
            $table->text('description');
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
