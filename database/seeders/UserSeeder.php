<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'level_id' => 1,
                'username' => 'admin',
                'nama' => 'Administrator 1',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_id' => 2,
                'username' => 'manager1',
                'nama' => 'Manager 1',
                'password' => Hash::make('manager123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_id' => 3,
                'username' => 'kasir1',
                'nama' => 'Kasir 1',
                'password' => Hash::make('kasir123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('m_user')->insert($data);
    }
}
