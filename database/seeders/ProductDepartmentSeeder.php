<?php

namespace Database\Seeders;

use App\Models\ProductDepartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $departments = [
            ['name' => 'Elektronik'],
            ['name' => 'Pakaian'],
            ['name' => 'Makanan'],
        ];

        foreach ($departments as $department) {
            ProductDepartment::create($department);
        }
    }
}
