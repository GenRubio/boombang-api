<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjectInteractionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('object_interactions')->insert([
            [
                'id' => 1,
                'name' => 'Objeto pocion',
                'model' => 28,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Objeto normal',
                'model' => 2,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Objeto volador',
                'model' => 10,
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'Objeto hablador',
                'model' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 5,
                'name' => 'Objeto clickable',
                'model' => 36,
                'created_at' => $now,
            ],
        ]);
    }
}
