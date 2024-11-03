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
            $table->string('code')->unique(); // Kode produk
            $table->string('name'); // Nama produk
            $table->text('description'); // Deskripsi produk
            $table->string('image'); // Gambar produk (path)
            $table->decimal('price', 15, 2); // Harga produk
            $table->unsignedBigInteger('department_id'); // Foreign key untuk departemen
            $table->unsignedBigInteger('class_id'); // Foreign key untuk kategori
            $table->unsignedBigInteger('subclass_id'); // Foreign key untuk subkategori
            $table->unsignedBigInteger('brand_id'); // Foreign key untuk brand
            $table->timestamps();

            // Foreign key definitions
            $table->foreign('department_id')->references('id')->on('product_departments')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('product_classes')->onDelete('cascade');
            $table->foreign('subclass_id')->references('id')->on('product_subclasses')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
