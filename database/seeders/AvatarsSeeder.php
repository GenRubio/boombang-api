<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvatarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('avatars')->insert([
            [
                'id' => 1,
                'name' => 'Nerd',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Vieja',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Rasta',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'Viejo',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 5,
                'name' => 'India',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 6,
                'name' => 'Mafioso',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 7,
                'name' => 'Zeta',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 8,
                'name' => 'Gata',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 9,
                'name' => 'Boomer',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 10,
                'name' => 'DJ',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 11,
                'name' => 'Bruja',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 12,
                'name' => 'Ninja',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 13,
                'name' => 'Espectro',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 14,
                'name' => 'Fantasma',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 15,
                'name' => 'Zombi',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 16,
                'name' => 'Lobo',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 17,
                'name' => 'Esqueleto',
                'image' => null,
                'active' => 1,
                'created_at' => $now,
            ],
        ]);
    }
}
