<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'security_code' => null,
            'user_age' => null,
            'coins_gold' => 100000,
            'coins_silver' => 1000000,
            'vip' => null,
            'admin' => 1,
            'register_ip' => null,
            'current_ip' => null,
            'last_connection_date' => Carbon::now(),
            'active' => true,
            'created_at' => $now,
        ]);

        DB::table('data_users')->insert([
            'id' => 1,
            'user_id' => 1,
            'avatar_id' => 1,
            'avatar_colors_hex' => 'FFD797FFCC00FFFFFF6633000066CCFFFFFF000000',
            'created_at' => $now,
        ]);
    }
}
