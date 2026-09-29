<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'npm'        => '18429090',
                'nama'       => 'Cantik Jelita',
                'prodi'      => 'TI',
                'tahunmasuk' => 2018,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'npm'        => '18428090',
                'nama'       => 'Ganteng Maksimal',
                'prodi'      => 'SI',
                'tahunmasuk' => 2018,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'npm'        => '18326090',
                'nama'       => 'Cetar Membahana',
                'prodi'      => 'MI',
                'tahunmasuk' => 2018,
                'created_at' => now(),
                'updated_at' => null,
            ],
        ]);
    }
}