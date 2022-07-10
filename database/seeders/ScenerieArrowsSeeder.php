<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScenerieArrowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // /arrow 
        $now = Carbon::now();
        DB::table('scenery_arrows')->insert([
            [
                'id' => 1,
                'name' => '732',
                'image' => 'images/scenery/arrows/732.png',
                'model' => 2,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => '736',
                'image' => 'images/scenery/arrows/736.png',
                'model' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => '740',
                'image' => 'images/scenery/arrows/740.png',
                'model' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'name' => '744',
                'image' => 'images/scenery/arrows/744.png',
                'model' => 5,
                'created_at' => $now,
            ],
            [
                'id' => 5,
                'name' => '748',
                'image' => 'images/scenery/arrows/748.png',
                'model' => 6,
                'created_at' => $now,
            ],
            [
                'id' => 6,
                'name' => '752',
                'image' => 'images/scenery/arrows/752.png',
                'model' => 7,
                'created_at' => $now,
            ],
            [
                'id' => 7,
                'name' => '756',
                'image' => 'images/scenery/arrows/756.png',
                'model' => 8,
                'created_at' => $now,
            ],
            [
                'id' => 8,
                'name' => '760',
                'image' => 'images/scenery/arrows/760.png',
                'model' => 9,
                'created_at' => $now,
            ],
            [
                'id' => 9,
                'name' => '764',
                'image' => 'images/scenery/arrows/764.png',
                'model' => 10,
                'created_at' => $now,
            ],
            [
                'id' => 10,
                'name' => '768',
                'image' => 'images/scenery/arrows/768.png',
                'model' => 11,
                'created_at' => $now,
            ],
            [
                'id' => 11,
                'name' => '772',
                'image' => 'images/scenery/arrows/772.png',
                'model' => 12,
                'created_at' => $now,
            ],
            [
                'id' => 12,
                'name' => '776',
                'image' => 'images/scenery/arrows/776.png',
                'model' => 13,
                'created_at' => $now,
            ],
            [
                'id' => 13,
                'name' => '780',
                'image' => 'images/scenery/arrows/780.png',
                'model' => 14,
                'created_at' => $now,
            ],
            [
                'id' => 14,
                'name' => '784',
                'image' => 'images/scenery/arrows/784.png',
                'model' => 15,
                'created_at' => $now,
            ],
            [
                'id' => 15,
                'name' => '788',
                'image' => 'images/scenery/arrows/788.png',
                'model' => 16,
                'created_at' => $now,
            ],
            [
                'id' => 16,
                'name' => '792',
                'image' => 'images/scenery/arrows/792.png',
                'model' => 17,
                'created_at' => $now,
            ],
        ]);
    }
}
