<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniGamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('mini_games')->insert([
            [
                'id' => 1,
                'name' => 'Ring',
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Sendero Oculto',
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Cocos Locos',
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'Camino Ninja',
                'active' => 1,
                'created_at' => $now,
            ],
        ]);
    }
}
