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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('fldesc')->unique(); // Kode produk
            $table->string('shdesc')->nullable();
            $table->string('sescd')->nullable();
            $table->string('barcode')->unique();
            $table->date('launch_date');
            $table->string('picture'); // Gambar produk (path)
            $table->string('department_code'); // Foreign key untuk departemen
            $table->string('group_code');
            $table->string('sub_group_code'); // Foreign key untuk subkategori
            $table->string('class_code'); // Foreign key untuk kategori
            $table->integer('cost');
            $table->string('brand'); // Foreign key untuk brand
            $table->integer('gross_price');
            $table->integer('discount_price');
            $table->integer('member_price');
            $table->unsignedBigInteger('price_id');
            $table->unsignedBigInteger('brand_id');

            // Definisi foreign key ke tabel branch
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('cascade');
            // Definisi foreign key ke tabel branch
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->timestamps();
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
