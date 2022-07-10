<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IslandTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('island_types')->insert([
            [
                'id' => 1,
                'name' => 'Isla perdida',
                'file_name' => 'isla1',
                'file_path' => 'static/flash_esp/dswmedia/isla/isla1.swf',
                'model' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Isla volcan',
                'file_name' => 'isla2',
                'file_path' => 'static/flash_esp/dswmedia/isla/isla2.swf',
                'model' => 2,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Isla hielo',
                'file_name' => 'isla3',
                'file_path' => 'static/flash_esp/dswmedia/isla/isla3.swf',
                'model' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'Isla desierto',
                'file_name' => 'isla4',
                'file_path' => 'static/flash_esp/dswmedia/isla/isla4.swf',
                'model' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 5,
                'name' => 'Isla peligrosa',
                'file_name' => 'isla5',
                'file_path' => 'static/flash_esp/dswmedia/isla/isla5.swf',
                'model' => 5,
                'created_at' => $now,
            ],
        ]);
    }
}
