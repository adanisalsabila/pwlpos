<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run()
    {
       

        // Ambil semua penjualan
        $penjualanIds = DB::table('t_penjualan')->pluck('penjualan_id')->toArray();

        // Ambil semua barang lengkap dengan harga_jual
        $barangList = DB::table('m_barang')
            ->select('barang_id', 'harga_jual')
            ->get();

        if (empty($penjualanIds) || $barangList->isEmpty()) {
            $this->command->error('Pastikan tabel t_penjualan dan m_barang memiliki data.');
            return;
        }

        $data = [];

        foreach ($penjualanIds as $penjualanId) {
            // Ambil 3 barang acak dari daftar barang
            $barangSample = $barangList->random(min(3, $barangList->count()));

            foreach ($barangSample as $barang) {
                $data[] = [
                    'penjualan_id' => $penjualanId,
                    'barang_id' => $barang->barang_id,
                    'harga' => $barang->harga_jual, // ambil dari m_barang
                    'jumlah' => rand(1, 3),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('t_penjualan_detail')->insert($data);

        $this->command->info(count($data) . ' data berhasil ditambahkan ke t_penjualan_detail!');
    }
}
