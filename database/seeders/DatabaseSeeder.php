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
            AvatarsSeeder::class,
            MenuCategoriesSeeder::class,
            SceneryModelsSeeder::class,
            SceneryObjectPositionsSeeder::class,
            SceneryObjectTypesSeeder::class,
            CatalogueCategoriesSeeder::class,
            MiniGamesSeeder::class,
            ObjectRaritiesSeeder::class,
            ObjectTypesSeeder::class,
            ObjectInteractionsSeeder::class,
            MiniGamesLevelsSeeder::class,
            GamesSceneriesSeeder::class,
            HomeSceneriesSeeder::class,
            IslandTypesSeeder::class,
            IslandSceneriesSeeder::class,
            MiniGamesSceneriesSeeder::class,
            PublicSceneriesSeeder::class,
            ScenerieArrowsSeeder::class,
            SceneryItemAppearancesSeeder::class,
            SceneryItemCaptureSeeder::class
        ]);
    }
}
