<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data stok yang akan dimasukkan ke dalam database
        $data = [
            [
                'barang_id' => 1, 
                'user_id' => 1, // Administrator
                'supplier_id' => 1, 
                'stok_tanggal' => Carbon::now()->subDays(1), // 1 hari yang lalu
                'stok_jumlah' => 100,
            ],
            [
                'barang_id' => 2, 
                'user_id' => 1, // Administrator
                'supplier_id' => 2, 
                'stok_tanggal' => Carbon::now()->subDays(2), // 2 hari yang lalu
                'stok_jumlah' => 150,
            ],
            [
                'barang_id' => 3, 
                'user_id' => 1, // Administrator
                'supplier_id' => 3, 
                'stok_tanggal' => Carbon::now()->subDays(3), // 3 hari yang lalu
                'stok_jumlah' => 200,
            ],
            [
                'barang_id' => 4, 
                'user_id' => 2, // Kasir Satu
                'supplier_id' => 1, 
                'stok_tanggal' => Carbon::now()->subDays(4), // 4 hari yang lalu
                'stok_jumlah' => 250,
            ],
            [
                'barang_id' => 5, 
                'user_id' => 2, // Kasir Satu
                'supplier_id' => 2, 
                'stok_tanggal' => Carbon::now()->subDays(5), // 5 hari yang lalu
                'stok_jumlah' => 300,
            ],
        ];

        // Menggunakan DB::table untuk memasukkan data
        DB::table('t_stok')->insert($data);
        
        // Memberikan informasi setelah seeding selesai
        $this->command->info('Data t_stok berhasil di-seed.');
    }
}
