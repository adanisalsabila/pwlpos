<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Kasir 1
            ['user_id' => 3, 'pembeli' => 'Pelanggan A', 'penjualan_kode' => 'PJL20250502001', 'penjualan_tanggal' => Carbon::now(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'pembeli' => 'Pelanggan B', 'penjualan_kode' => 'PJL20250502002', 'penjualan_tanggal' => Carbon::now()->addMinutes(30), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Kasir 2
            ['user_id' => 3, 'pembeli' => 'Pelanggan C', 'penjualan_kode' => 'PJL20250502003', 'penjualan_tanggal' => Carbon::now()->addMinutes(60), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'pembeli' => 'Pelanggan D', 'penjualan_kode' => 'PJL20250502004', 'penjualan_tanggal' => Carbon::now()->addMinutes(90), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Kasir 3
            ['user_id' => 3, 'pembeli' => 'Pelanggan E', 'penjualan_kode' => 'PJL20250502005', 'penjualan_tanggal' => Carbon::now()->addMinutes(120), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'pembeli' => 'Pelanggan F', 'penjualan_kode' => 'PJL20250502006', 'penjualan_tanggal' => Carbon::now()->addMinutes(150), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'pembeli' => 'Pelanggan G', 'penjualan_kode' => 'PJL20250502007', 'penjualan_tanggal' => Carbon::now()->addMinutes(180), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        // Menggunakan insertOrIgnore untuk menghindari duplikasi data
        DB::table('t_penjualan')->insertOrIgnore($data);

        // Memberikan informasi setelah proses seeding selesai
        $this->command->info('Data t_penjualan berhasil di-seed.');
    }
}
