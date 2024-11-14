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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_order_id')->constrained('sales_orders')->onDelete('cascade');
            $table->string('invoice_number')->unique(); // Nomor unik untuk faktur
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->decimal('total_amount', 10, 2); // Total jumlah yang harus dibayar
            $table->enum('status', ['pending', 'paid', 'cancelled']); // Status pembayaran
            $table->date('issue_date'); // Tanggal penerbitan faktur
            $table->date('due_date'); // Tanggal jatuh tempo
            $table->date('payment_date')->nullable(); // Tanggal pembayaran
            $table->text('notes')->nullable(); // Catatan tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
