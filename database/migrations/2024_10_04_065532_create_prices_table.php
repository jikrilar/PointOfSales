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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('gross_price', 15, 2);
            $table->decimal('discount_percentage', 5, 2)->nullable(); // untuk persentase diskon hingga dua angka desimal
            $table->decimal('discount_amount', 15, 2)->nullable();
            $table->decimal('discount_price', 15, 2)->nullable();
            $table->enum('membership', ['platinum', 'gold', 'silver', 'none']);
            $table->decimal('membership_discount_percentage', 5, 2)->nullable();
            $table->decimal('membership_discount_amount', 15, 2)->nullable();
            $table->decimal('membership_price', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
