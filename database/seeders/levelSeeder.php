<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class levelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Level::Create( [
            'level' => 'Admin',

        ]);

       Level::Create( [

            'level' => 'Personalia',

        ]);

       Level::Create( [

            'level' => 'Karyawan'
        ]);
    }
}
