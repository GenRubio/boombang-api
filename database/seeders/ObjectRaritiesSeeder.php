<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjectRaritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('object_rarities')->insert([
            [
                'id' => 1,
                'name' => 'UNICO',
                'model' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'CASI UNICO',
                'model' => 2,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'MUY RARE',
                'model' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'RARE',
                'model' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 5,
                'name' => 'NORMAL',
                'model' => 0,
                'created_at' => $now,
            ],
        ]);
    }
}
