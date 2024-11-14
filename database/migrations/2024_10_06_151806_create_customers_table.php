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
            $table->string('customer_name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->enum('membership', ['platinum', 'gold', 'silver', 'none']);
            $table->enum('race', ['indonesian', 'malaysian', 'singaporean', 'european', 'arabs']);
            $table->enum('age_category', ['12-24', '25-30', '31-40', '41-55', '>55']);
            $table->enum('gender', ['male', 'female']);
            $table->integer('total_spending');
            $table->integer('transaction_counter');
            $table->date('customer_birthday');
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
