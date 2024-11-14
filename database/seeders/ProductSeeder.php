<?php

namespace Database\Seeders;

use App\Http\Controllers\ProductSubclassController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data produk
        $products = [
            [
                'fldesc' => 'bb wallet 10 cards',
                'barcode' => '8862414122',
                'picture' => 'img/products/item-1.front.webp',
                'launch_date' => '2024-01-01',
                'department_code' => 'G',
                'brand' => 'BB',
                'group_code' => 'SLG',
                'sub_group_code' => 'SLG',
                'class_code' => 'WAL',
                'gross_price' => 1000000,
                'discount_price' => 1000000,
                'member_price' => 0,
                'cost' => 700000,
                'price_id' => 1,
                'brand_id' => 1,
            ],
        ];

        // Insert data ke tabel products
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
