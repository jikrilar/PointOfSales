<?php

namespace Database\Seeders;

use App\Models\ProductClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $classes = [
            ['name' => 'Gadget'],
            ['name' => 'Aksesoris'],
            ['name' => 'Minuman'],
        ];

        foreach ($classes as $class) {
            ProductClass::create($class);
        }
    }
}
