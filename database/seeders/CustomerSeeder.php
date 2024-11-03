<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Ahmad Fauzi',
                'ktp_number' => '3201234567890001',
                'ktp_photo' => 'photos/ktp/ahmad_fauzi.jpg', // Path untuk foto KTP
                'photo' => 'photos/profile/ahmad_fauzi.jpg', // Path untuk foto profil
                'email' => 'ahmad.fauzi@example.com',
                'phone_number' => '081234567890',
                'birthday' => '1990-05-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dewi Sartika',
                'ktp_number' => '3201987654321002',
                'ktp_photo' => 'photos/ktp/dewi_sartika.jpg',
                'photo' => 'photos/profile/dewi_sartika.jpg',
                'email' => 'dewi.sartika@example.com',
                'phone_number' => '081298765432',
                'birthday' => '1985-11-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Santoso',
                'ktp_number' => '3201122334455667',
                'ktp_photo' => 'photos/ktp/budi_santoso.jpg',
                'photo' => null, // Foto profil tidak ada
                'email' => 'budi.santoso@example.com',
                'phone_number' => '081377788899',
                'birthday' => '1978-08-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data customer lain sesuai kebutuhan
        ]);
    }
}
