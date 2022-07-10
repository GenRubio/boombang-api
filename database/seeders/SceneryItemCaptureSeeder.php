<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SceneryItemCaptureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('scenery_item_captures')->insert([
            [
                'id' => 1,
                'name' => 'Posicionarse encima',
                'model' => 0,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Hacer click encima',
                'model' => 1,
                'created_at' => $now,
            ],
        ]);
    }
}
