<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
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
            [1, 'Spanish', 'es', 'español', 1],
            [2, 'Catalan', 'ca', 'Català', 1],
            [3, 'English', 'en', 'English', 1]
        ];
        foreach ($data as $insert) {
            DB::insert('insert into languages (id, name, abbr, native, active) values (?,?,?,?,?)', $insert);
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
