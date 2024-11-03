<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cashier; // Ganti dengan namespace model Cashier Anda
use Illuminate\Support\Str;

class CashierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cashiers = [
            [
                'name' => 'Kasir 1',
                'phone_number' => '081234567890',
                'branch_id' => 1, // Ganti dengan ID cabang yang sesuai
                'user_id' => 1,
            ],
            [
                'name' => 'Kasir 2',
                'phone_number' => '081234567891',
                'branch_id' => 1, // Ganti dengan ID cabang yang sesuai
                'user_id' => 2,
            ],
            [
                'name' => 'Kasir 3',
                'phone_number' => '081234567892',
                'branch_id' => 2, // Ganti dengan ID cabang yang sesuai
                'user_id' => 3,
            ],
        ];

        foreach ($cashiers as $cashier) {
            Cashier::create($cashier);
        }
    }
}
