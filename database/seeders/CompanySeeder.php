<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'PT. Mitra Sejahtera',
                'address' => 'Jl. Jendral Sudirman No. 10, Jakarta Pusat, DKI Jakarta, Indonesia',
                'phone_number' => '021-12345678',
                'email' => 'info@mitrasejahtera.co.id',
                'bank' => 'Bank Mandiri',
                'account_number' => '1234567890',
                'account_name' => 'PT. Mitra Sejahtera',
                'vat' => '10%',
                'tax_number' => '123456789012345',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PT. Sinar Terang',
                'address' => 'Jl. Merdeka No. 50, Bandung, Jawa Barat, Indonesia',
                'phone_number' => '022-98765432',
                'email' => 'contact@sinarterang.co.id',
                'bank' => 'Bank BCA',
                'account_number' => '0987654321',
                'account_name' => 'PT. Sinar Terang',
                'vat' => '10%',
                'tax_number' => '987654321098765',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data perusahaan lain sesuai kebutuhan
        ]);
    }
}
