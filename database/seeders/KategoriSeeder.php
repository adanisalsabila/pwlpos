<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_kode' => 'SM', 'kategori_nama' => 'SM Entertainment', 'created_at' => now(), 'updated_at' => now()],
            ['kategori_kode' => 'HYBE', 'kategori_nama' => 'HYBE Entertainment', 'created_at' => now(), 'updated_at' => now()],
            ['kategori_kode' => 'JYP', 'kategori_nama' => 'JYP Entertainment', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
