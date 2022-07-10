<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SceneryObjectPositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('scenery_object_positions')->insert([
            [
                'id' => 1,
                'name' => 'Abajo de la sala',
                'model' => 0,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Arriba de la sala',
                'model' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Intermedio de la sala',
                'model' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'Multiple nivel',
                'model' => 4,
                'created_at' => $now,
            ],
        ]);
    }
}
