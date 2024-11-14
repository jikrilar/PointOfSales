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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama perusahaan
            $table->text('address'); // Alamat perusahaan
            $table->string('phone_number'); // Nomor telepon perusahaan
            $table->string('email')->unique(); // Email perusahaan
            $table->string('bank'); // Nama bank perusahaan
            $table->string('account_number')->unique(); // Nomor rekening perusahaan
            $table->string('account_name'); // Nama pemilik rekening (a/n)
            $table->string('vat'); // VAT (Pajak Pertambahan Nilai)
            $table->string('tax_number')->unique(); // Nomor pajak perusahaan (NPWP)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
