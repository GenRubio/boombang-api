<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SceneryModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('scenery_models')->insert([
            [
                'id' => 1,
                'name' => 'Escenario publico',
                'model' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Escenario privado',
                'model' => 0,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Escenario juego',
                'model' => 2,
                'created_at' => $now,
            ],
        ]);
    }
}
