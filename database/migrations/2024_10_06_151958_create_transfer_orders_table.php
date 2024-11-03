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
        Schema::create('transfer_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->unsignedBigInteger('source_branch');
            $table->unsignedBigInteger('destination_branch');
            $table->date('order_date');
            $table->text('description')->nullable();
            $table->timestamps();

            // Foreign key references
            $table->foreign('source_branch')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('destination_branch')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_orders');
    }
};
