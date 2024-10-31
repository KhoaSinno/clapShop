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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customerID'); // ID của Customer
            $table->unsignedBigInteger('adminID')->nullable(); // ID của Admin đặt hàng thay
            $table->string('address', 255);
            $table->integer('totalQuantity');
            $table->double('totalPrice');
            $table->string('note', 255)->nullable();
            $table->string('paymentMethod', 255);
            $table->string('status', 50);
            $table->timestamps();

            $table->foreign('customerID')->references('id')->on('users');
            $table->foreign('adminID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
