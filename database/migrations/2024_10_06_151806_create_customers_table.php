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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama customer
            $table->string('ktp_number')->unique(); // Nomor KTP
            $table->string('ktp_photo'); // Foto KTP (path foto)
            $table->string('photo')->nullable(); // Foto profil
            $table->string('email')->unique(); // Email customer
            $table->string('phone_number'); // Nomor telepon customer
            $table->date('birthday'); // Tanggal lahir customer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
