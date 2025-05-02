<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_supplier')->insert([
            [
                'supplier_kode' => 'SUP01',
                'supplier_nama' => 'PT Pak Sooman',
                'alamat' => 'Jl. Merdeka No. 10',
                'telepon' => '021-1234567',
                'email' => 'maju@mundur.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_kode' => 'SUP02',
                'supplier_nama' => 'CV Jiyo',
                'alamat' => 'Gg. Anggrek No. 5',
                'telepon' => '031-9876543',
                'email' => 'cv@jiyooo.net',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
