<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjectTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('object_types')->insert([
            [
                'id' => 1,
                'name' => 'Objeto Item',
                'model' => 0,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Objeto para un escenario',
                'model' => 1,
                'created_at' => $now,
            ],
        ]);
    }
}
