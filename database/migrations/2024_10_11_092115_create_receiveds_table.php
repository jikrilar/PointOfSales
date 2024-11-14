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
        Schema::create('receiveds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transfer_order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity_received');  // Jumlah barang yang diterima
            $table->date('received_date');         // Tanggal diterimanya barang
            $table->text('notes')->nullable();     // Catatan jika ada barang yang hilang
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receiveds');
    }
};
