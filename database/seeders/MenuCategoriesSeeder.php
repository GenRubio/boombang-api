<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('menu_categories')->insert([
            [
                'id' => 1,
                'name' => 'Area',
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Isla',
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Juego',
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'Casa',
                'created_at' => $now,
            ],
            [
                'id' => 5,
                'name' => 'MiniJuego',
                'created_at' => $now,
            ],
        ]);
    }
}
