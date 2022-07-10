<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniGamesLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('mini_games_levels')->insert([
            [
                'id' => 1,
                'mini_game_id' => 1,
                'min_points' => 1,
                'max_points' => 9,
                'finish_level_points' => null,
                'level' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'mini_game_id' => 1,
                'min_points' => 10,
                'max_points' => 24,
                'finish_level_points' => null,
                'level' => 2,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'mini_game_id' => 1,
                'min_points' => 25,
                'max_points' => 49,
                'finish_level_points' => null,
                'level' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'mini_game_id' => 1,
                'min_points' => 50,
                'max_points' => 99,
                'finish_level_points' => null,
                'level' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 5,
                'mini_game_id' => 1,
                'min_points' => 100,
                'max_points' => 199,
                'finish_level_points' => null,
                'level' => 5,
                'created_at' => $now,
            ],
            [
                'id' => 6,
                'mini_game_id' => 1,
                'min_points' => 200,
                'max_points' => 499,
                'finish_level_points' => null,
                'level' => 6,
                'created_at' => $now,
            ],
            [
                'id' => 7,
                'mini_game_id' => 1,
                'min_points' => 500,
                'max_points' => 999,
                'finish_level_points' => null,
                'level' => 7,
                'created_at' => $now,
            ],
            [
                'id' => 8,
                'mini_game_id' => 1,
                'min_points' => 1000,
                'max_points' => 1999,
                'finish_level_points' => null,
                'level' => 8,
                'created_at' => $now,
            ],
            [
                'id' => 9,
                'mini_game_id' => 1,
                'min_points' => 2000,
                'max_points' => null,
                'finish_level_points' => null,
                'level' => 9,
                'created_at' => $now,
            ],
            [
                'id' => 10,
                'mini_game_id' => 3,
                'min_points' => 0,
                'max_points' => 4,
                'finish_level_points' => 5,
                'level' => 0,
                'created_at' => $now,
            ],
            [
                'id' => 11,
                'mini_game_id' => 3,
                'min_points' => 5,
                'max_points' => 9,
                'finish_level_points' => 10,
                'level' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 12,
                'mini_game_id' => 3,
                'min_points' => 10,
                'max_points' => 24,
                'finish_level_points' => 25,
                'level' => 2,
                'created_at' => $now,
            ],
            [
                'id' => 13,
                'mini_game_id' => 3,
                'min_points' => 25,
                'max_points' => 49,
                'finish_level_points' => 50,
                'level' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 14,
                'mini_game_id' => 3,
                'min_points' => 50,
                'max_points' => 74,
                'finish_level_points' => 75,
                'level' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 15,
                'mini_game_id' => 3,
                'min_points' => 75,
                'max_points' => 99,
                'finish_level_points' => 100,
                'level' => 5,
                'created_at' => $now,
            ],
            [
                'id' => 16,
                'mini_game_id' => 3,
                'min_points' => 100,
                'max_points' => 149,
                'finish_level_points' => 150,
                'level' => 6,
                'created_at' => $now,
            ],
            [
                'id' => 17,
                'mini_game_id' => 3,
                'min_points' => 150,
                'max_points' => 199,
                'finish_level_points' => 200,
                'level' => 7,
                'created_at' => $now,
            ],
            [
                'id' => 18,
                'mini_game_id' => 3,
                'min_points' => 200,
                'max_points' => 299,
                'finish_level_points' => 300,
                'level' => 8,
                'created_at' => $now,
            ],
            [
                'id' => 19,
                'mini_game_id' => 3,
                'min_points' => 300,
                'max_points' => null,
                'finish_level_points' => null,
                'level' => 9,
                'created_at' => $now,
            ],
            [
                'id' => 20,
                'mini_game_id' => 4,
                'min_points' => 0,
                'max_points' => 199,
                'finish_level_points' => 200,
                'level' => 0,
                'created_at' => $now,
            ],
            [
                'id' => 21,
                'mini_game_id' => 4,
                'min_points' => 200,
                'max_points' => 204,
                'finish_level_points' => 205,
                'level' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 22,
                'mini_game_id' => 4,
                'min_points' => 205,
                'max_points' => 209,
                'finish_level_points' => 210,
                'level' => 2,
                'created_at' => $now,
            ],
            [
                'id' => 23,
                'mini_game_id' => 4,
                'min_points' => 210,
                'max_points' => 224,
                'finish_level_points' => 225,
                'level' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 24,
                'mini_game_id' => 4,
                'min_points' => 225,
                'max_points' => 249,
                'finish_level_points' => 250,
                'level' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 25,
                'mini_game_id' => 4,
                'min_points' => 250,
                'max_points' => 274,
                'finish_level_points' => 275,
                'level' => 5,
                'created_at' => $now,
            ],
            [
                'id' => 26,
                'mini_game_id' => 4,
                'min_points' => 275,
                'max_points' => 299,
                'finish_level_points' => 300,
                'level' => 6,
                'created_at' => $now,
            ],
            [
                'id' => 27,
                'mini_game_id' => 4,
                'min_points' => 300,
                'max_points' => 349,
                'finish_level_points' => 350,
                'level' => 7,
                'created_at' => $now,
            ],
            [
                'id' => 28,
                'mini_game_id' => 4,
                'min_points' => 350,
                'max_points' => 399,
                'finish_level_points' => 400,
                'level' => 8,
                'created_at' => $now,
            ],
            [
                'id' => 29,
                'mini_game_id' => 4,
                'min_points' => 400,
                'max_points' => 499,
                'finish_level_points' => 500,
                'level' => 9,
                'created_at' => $now,
            ],
            [
                'id' => 30,
                'mini_game_id' => 4,
                'min_points' => 500,
                'max_points' => null,
                'finish_level_points' => null,
                'level' => 10,
                'created_at' => $now,
            ],
        ]);
    }
}
