<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('catalogue_categories')->insert([
            [
                'id' => 1,
                'name' => 'Objetos Decorativos',
                'model' => 1,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Set Bosque',
                'model' => 2,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Mascotas y cosas parecidas',
                'model' => 3,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'Set Miedo',
                'model' => 4,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 5,
                'name' => 'Set Indio',
                'model' => 5,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 6,
                'name' => 'Set Hielo',
                'model' => 6,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 7,
                'name' => 'San Valentin',
                'model' => 7,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 8,
                'name' => 'Regalos',
                'model' => 8,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 9,
                'name' => 'Set Alien',
                'model' => 9,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 10,
                'name' => 'Set Pirata',
                'model' => 11,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 11,
                'name' => 'Set Oriental',
                'model' => 13,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 12,
                'name' => 'Set Magia',
                'model' => 14,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 13,
                'name' => 'Set Pascuas',
                'model' => 15,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 14,
                'name' => 'Para tu Casita',
                'model' => 16,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 15,
                'name' => 'Novedades',
                'model' => 17,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 16,
                'name' => 'Plantas',
                'model' => 19,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 17,
                'name' => 'Set Navidad',
                'model' => 20,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 18,
                'name' => 'BBox',
                'model' => 21,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 19,
                'name' => 'Efectos',
                'model' => 22,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 20,
                'name' => 'Deportes',
                'model' => 23,
                'active' => 1,
                'created_at' => $now,
            ],
        ]);
    }
}
