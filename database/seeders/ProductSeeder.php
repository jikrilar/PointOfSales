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
                'code' => 'PRD001',
                'name' => 'Produk A',
                'description' => 'Deskripsi untuk Produk A',
                'image' => 'images/products/product_a.jpg', // Pastikan path ini benar atau sesuaikan sesuai penyimpanan file gambar
                'price' => 100000.00,
                'department_id' => 1, // Sesuaikan dengan id yang tersedia di tabel product_departments
                'class_id' => 1, // Sesuaikan dengan id yang tersedia di tabel product_classes
                'subclass_id' => 1, // Sesuaikan dengan id yang tersedia di tabel product_subclasses
                'brand_id' => 1, // Sesuaikan dengan id yang tersedia di tabel brands
            ],
            [
                'code' => 'PRD002',
                'name' => 'Produk B',
                'description' => 'Deskripsi untuk Produk B',
                'image' => 'images/products/product_b.jpg',
                'price' => 150000.00,
                'department_id' => 2,
                'class_id' => 2,
                'subclass_id' => 2,
                'brand_id' => 2,
            ],
            [
                'code' => 'PRD003',
                'name' => 'Produk C',
                'description' => 'Deskripsi untuk Produk C',
                'image' => 'images/products/product_c.jpg',
                'price' => 200000.00,
                'department_id' => 3,
                'class_id' => 3,
                'subclass_id' => 3,
                'brand_id' => 3,
            ],
        ];

        // Insert data ke tabel products
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
