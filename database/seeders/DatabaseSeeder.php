<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Cashier;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductClass;
use App\Models\ProductDepartment;
use App\Models\ProductSubclass;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Panggil class seeder yang diinginkan
        $this->call([
            ProductDepartmentSeeder::class,
            ProductClassSeeder::class,
            ProductSubclassSeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            CompanySeeder::class,
            BranchSeeder::class,
            UserSeeder::class,
            CashierSeeder::class,
            CustomerSeeder::class,
        ]);
    }
}
