<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SceneryObjectTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('scenery_object_types')->insert([
            [
                'id' => 1,
                'name' => 'Isla',
                'model' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Casa',
                'model' => 4,
                'created_at' => $now,
            ],
        ]);
    }
}
