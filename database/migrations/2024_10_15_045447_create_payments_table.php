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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('invoices')->onDelete('cascade');
            $table->decimal('amount', 10, 2); // Jumlah yang dibayarkan
            $table->date('payment_date'); // Tanggal pembayaran
            $table->enum('payment_method', ['cash', 'credit_card', 'bank_transfer', 'e_wallet']); // Metode pembayaran
            $table->string('transaction_number')->nullable(); // Nomor transaksi (jika ada)
            $table->text('notes')->nullable(); // Catatan tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
