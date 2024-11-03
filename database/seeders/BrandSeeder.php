<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Nike',
                'description' => 'Brand terkenal untuk pakaian dan sepatu olahraga.',
                'logo' => 'images/brands/nike.png',
                'website_url' => 'https://www.nike.com',
            ],
            [
                'name' => 'Adidas',
                'description' => 'Perusahaan multinasional Jerman yang merancang dan memproduksi sepatu, pakaian, dan aksesori.',
                'logo' => 'images/brands/adidas.png',
                'website_url' => 'https://www.adidas.com',
            ],
            [
                'name' => 'Puma',
                'description' => 'Perusahaan yang memproduksi pakaian olahraga dan aksesori.',
                'logo' => 'images/brands/puma.png',
                'website_url' => 'https://www.puma.com',
            ],
            [
                'name' => 'Reebok',
                'description' => 'Brand global yang menyediakan perlengkapan dan pakaian olahraga.',
                'logo' => 'images/brands/reebok.png',
                'website_url' => 'https://www.reebok.com',
            ],
            [
                'name' => 'Under Armour',
                'description' => 'Perusahaan yang memproduksi pakaian, sepatu, dan aksesoris olahraga.',
                'logo' => 'images/brands/under_armour.png',
                'website_url' => 'https://www.underarmour.com',
            ],
        ];

        // Insert data into the brands table
        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
