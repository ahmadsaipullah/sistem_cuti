<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Membuat pengguna Admin Super
        User::create([
            'nik' => 'NIK001',
            'nama' => 'Admin Super',
            'dept' => 'IT',
            'bag' => 'Support',
            'seksi' => 'Development',
            'email' => 'adminsuper@gmail.com',
            'password' => Hash::make('123456789'),
            'no_hp' => '087880182823',
            'image' => null, // Atau tambahkan path image jika ada
            'level_id' => '1',

        ]);

        // Membuat pengguna Admin
        User::create([
            'nik' => 'NIK002',
            'nama' => 'Admin',
            'dept' => 'HR',
            'bag' => 'Management',
            'seksi' => 'Recruitment',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'no_hp' => '087880182823',
            'image' => null, // Atau tambahkan path image jika ada
            'level_id' => '2',

        ]);

        // Membuat pengguna Customer
        User::create([
            'nik' => 'NIK003',
            'nama' => 'Customer',
            'dept' => 'Sales',
            'bag' => 'Customer Service',
            'seksi' => 'Support',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('123456789'),
            'no_hp' => '087880182823',
            'image' => null, // Atau tambahkan path image jika ada
            'level_id' => '3',

        ]);




    }
}
