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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name'); // Nama cabang
            $table->text('address'); // Alamat cabang
            $table->string('phone_number'); // Nomor telepon cabang
            $table->string('email')->unique(); // Email cabang
            $table->unsignedBigInteger('company_id'); // Foreign key untuk company
            $table->string('tax_number');
            $table->string('vat');
            $table->timestamps();

            // Foreign key definition
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
