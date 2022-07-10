<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicSceneriesSeeder extends Seeder
{
    private $id = 0;
    private $insertArray = [];
    private $now;
    
    public function run()
    {
        $this->now = Carbon::now();

        $this->insertArray[] = $this->prepareData(1, 'Beluga Beach', '1111111111111111111111111111
        1111111111111111111111111111
        1111111111111111111111111111
        1111111111111111111111111111
        1111111111111111111111111111
        1111111111111111111111111111
        1111111111111111111111111111
        1111111110111111111111111111
        1111111100001111111111111111
        1111111000000001111111111111
        1111110000000000111111111111
        1111100000000000011111111111
        1111000000000000001111111111
        1110000000000000000111111111
        1110000000000000011111111111
        1111000000000000011111111111
        1111100000000000001111111111
        1111110000000000001111111111
        1111111000000000011111111111
        1111111100000000111111111111
        1111111110000001111111111111
        1111111111000011111111111111
        1111111111100111111111111111
        1111111111111111111111111111
        1111111111111111111111111111
        1111111111111111111111111111', 11, 11);


        DB::table('public_sceneries')->insert($this->insertArray);
    }

    private function prepareData($model, $name, $bitmap, $posX, $posY)
    {
        $this->id++;
        return [
            'id' => $this->id,
            'menu_category_id' => 3,
            'scenery_model_id' => 1,
            'name' => $name,
            'file_name' => "escenario{$model}",
            'file_path' => "static/flash_esp/dswmedia/escenarios/publicos/escenario{$model}.swf",
            'model' => $model,
            'bit_map' => refactorBitMap($bitmap),
            'position_x' => $posX,
            'position_y' => $posY,
            'order' => $this->id,
            'created_at' => $this->now,
        ];
    }
}
