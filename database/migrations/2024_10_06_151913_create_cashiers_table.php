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
        Schema::create('cashiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');             // Nama kasir
            $table->string('phone_number');     // Nomor telepon kasir
            $table->unsignedBigInteger('branch_id');  // Foreign key ke tabel branch
            $table->unsignedBigInteger('user_id');  // Foreign key ke tabel branch
            $table->timestamps();

            // Definisi foreign key ke tabel branch
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            // Definisi foreign key ke tabel branch
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashiers');
    }
};
