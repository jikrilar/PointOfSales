<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Ganti dengan namespace model User Anda
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'cashier1',
                'nik' => '11131',
                'email' => 'kasir1@example.com',
                'password' => Hash::make('password1'), // Ganti dengan password yang sesuai
                'role' => 'cashier',
            ],
            [
                'username' => 'cashier2',
                'nik' => '11132',
                'email' => 'kasir2@example.com',
                'password' => Hash::make('password2'),
                'role' => 'cashier',
            ],
            [
                'username' => 'cashier3',
                'nik' => '11133',
                'email' => 'kasir3@example.com',
                'password' => Hash::make('password3'),
                'role' => 'cashier',
            ],
            // Tambahkan lebih banyak pengguna sesuai kebutuhan
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
