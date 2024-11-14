<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            [
                'code' => 'CP200',
                'name' => 'Cabang Jakarta',
                'address' => 'Jl. Thamrin No. 20, Jakarta Pusat, DKI Jakarta, Indonesia',
                'phone_number' => '021-12398765',
                'email' => 'jakarta@mitrasejahtera.co.id',
                'company_id' => 1, // Sesuaikan dengan ID company yang ada di tabel companies
                'tax_number' => '123456789012345',
                'vat' => '10%',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'CP300',
                'name' => 'Cabang Bandung',
                'address' => 'Jl. Asia Afrika No. 15, Bandung, Jawa Barat, Indonesia',
                'phone_number' => '022-87654321',
                'email' => 'bandung@sinarterang.co.id',
                'company_id' => 2, // Sesuaikan dengan ID company yang ada di tabel companies
                'tax_number' => '987654321098765',
                'vat' => '10%',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data cabang lain sesuai kebutuhan
        ]);
    }
}
