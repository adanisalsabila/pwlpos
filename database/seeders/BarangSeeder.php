<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = [
            // NCT
            ['kategori_id' => 1, 'supplier_id' => 1, 'barang_kode' => 'ALB001', 'barang_nama' => 'Album NCT - Hello Future', 'harga_beli' => 120000, 'harga_jual' => 150000],
            
            // BTS
            ['kategori_id' => 2, 'supplier_id' => 2, 'barang_kode' => 'ALB002', 'barang_nama' => 'Album BTS - Idol', 'harga_beli' => 115000, 'harga_jual' => 145000],
            
            // IVE
            ['kategori_id' => 3, 'supplier_id' => 3, 'barang_kode' => 'ALB003', 'barang_nama' => 'Album IVE - After Like', 'harga_beli' => 125000, 'harga_jual' => 155000],
            
            // Photocard Jaehyun
            ['kategori_id' => 1, 'supplier_id' => 1, 'barang_kode' => 'PC01', 'barang_nama' => 'Photocard Jaehyun', 'harga_beli' => 300000, 'harga_jual' => 350000],
            
            // Photocard Jaemin
            ['kategori_id' => 1, 'supplier_id' => 1, 'barang_kode' => 'PC02', 'barang_nama' => 'Photocard Jaemin', 'harga_beli' => 250000, 'harga_jual' => 300000],
            
            // Keychain Wonyoung
            ['kategori_id' => 2, 'supplier_id' => 2, 'barang_kode' => 'KC01', 'barang_nama' => 'Keychain Wonyoung', 'harga_beli' => 100000, 'harga_jual' => 130000],
            
            // Lightstick GOT7
            ['kategori_id' => 3, 'supplier_id' => 3, 'barang_kode' => 'LS01', 'barang_nama' => 'Lightstick GOT7', 'harga_beli' => 600000, 'harga_jual' => 700000],
        ];

        // Insert data ke dalam tabel 'm_barang'
        DB::table('m_barang')->insert($barang);
    }
}
