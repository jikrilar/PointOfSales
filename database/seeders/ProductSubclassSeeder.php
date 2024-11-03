<?php

namespace Database\Seeders;

use App\Models\ProductSubclass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSubclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $subclasses = [
            ['name' => 'Smartphone'],
            ['name' => 'Jam Tangan'],
            ['name' => 'Soda'],
        ];

        foreach ($subclasses as $subclass) {
            ProductSubclass::create($subclass);
        }
    }
}
