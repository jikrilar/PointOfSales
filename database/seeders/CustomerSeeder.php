<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'customer_name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'phone_number' => '081377788899',
                'gender' => 'male',
                'age_category' => '31-40',
                'race' => 'indonesian',
                'total_spending' => 0,
                'transaction_counter' => 0,
                'customer_birthday' => '1976-11-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data customer lain sesuai kebutuhan
        ]);
    }
}
