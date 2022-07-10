<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SceneryItemAppearancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('scenery_item_appearances')->insert([
            [
                'id' => 1,
                'name' => 'Apricion normal',
                'model' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Apricion desde cielo',
                'model' => 2,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Apricion desvanecida',
                'model' => 3,
                'created_at' => $now,
            ],
        ]);
    }
}
