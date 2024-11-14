<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::create([
            'gross_price' => 1000000,
            'discount_percentage' => 10,
            'discount_amount' => 100000,
            'discount_price' => 900000,
            'membership' => 'none',
            'membership_discount_percentage' => 0,
            'membership_discount_amount' => 0,
            'membership_price' => 1000000,
        ]);
    }
}
