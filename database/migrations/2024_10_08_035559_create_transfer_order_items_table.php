<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transfer_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transfer_order_id'); // Foreign key to transfer_orders
            $table->unsignedBigInteger('product_id'); // Foreign key to products
            $table->integer('quantity');
            $table->timestamps();

            // Foreign key references
            $table->foreign('transfer_order_id')->references('id')->on('transfer_orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_order_items');
    }
};
