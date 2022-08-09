<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NpcsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->now = Carbon::now();
        $data = [
            [1, 'images/scenery/npcs/ef07dbcdf2d241da0c59c6b1f92ee6d2-image.jpg', 'npc0', NULL, '0', '2022-08-09 05:44:45', '2022-08-09 05:44:45'],
            [2, 'images/scenery/npcs/6d0ca8394c02c5d243860aebc5d0705c-image.jpg', 'npc1', NULL, '1', '2022-08-09 05:45:24', '2022-08-09 05:45:24'],
            [3, 'images/scenery/npcs/1d74e78316ea09e33cfe5e4560c372ed-image.jpg', 'npc2', NULL, '2', '2022-08-09 05:46:02', '2022-08-09 05:46:02'],
            [4, 'images/scenery/npcs/4435fa049380563bcbed78b04ded4a31-image.jpg', 'npc3', NULL, '3', '2022-08-09 05:46:47', '2022-08-09 05:46:47'],
            [5, 'images/scenery/npcs/90631bced91ff33e57503d878241f794-image.jpg', 'npc4', NULL, '4', '2022-08-09 05:47:28', '2022-08-09 05:47:28'],
        ];
        foreach ($data as $insert) {
            DB::insert('insert into game_objects (id, image, file_name, file_path, parameter, created_at, updated_at) values (?,?,?,?,?,?,?)', $insert);
        }
    }
}


/**
 * SELECT 
 *'19' as "param_object_rarity_id", 
 *'23' as "param_object_interaction_id", 
 *name, 
 *colors as "colors_hex", 
 *rgb_ratio as "colors_rgb", 
 *size_l as "size_big", 
 *size_m as "size_medium", 
 *size_s as "size_small", 
 *something_1 as "bit_map_size_big", 
 *something_2 as "bit_map_size_medium", 
 *something_3 as "bit_map_size_small", 
 *something_4 as "walk_over_size_big", 
 *something_5 as "walk_over_size_medium", 
 *something_6 as "walk_over_size_small", 
 *something_14 as "undefined_14", 
 *something_16 as "undefined_16", 
 *something_17 as "undefined_17"
 *FROM boombang_catalog
 */
