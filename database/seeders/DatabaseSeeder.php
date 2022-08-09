<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ParametricTableSeeder::class,
            ParametricTableValueSeeder::class,
            UsersSeeder::class,
            ScenerieSeeder::class,
            ItemsSeeder::class,
            GameObjectsSeeder::class,
            NpcsSeeder::class,
            LanguagesSeeder::class
        ]);
    }
}
