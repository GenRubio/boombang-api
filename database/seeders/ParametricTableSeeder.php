<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametricTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->now = Carbon::now();
        DB::table('parametric_tables')->insert([
            ['id' => 1, 'name' => 'menu_categories', 'comment' => null, 'created_at' => $this->now],
            ['id' => 2, 'name' => 'scenery_models', 'comment' => null, 'created_at' => $this->now],
            ['id' => 3, 'name' => 'scenery_object_types', 'comment' => 'something_15', 'created_at' => $this->now],
            ['id' => 4, 'name' => 'scenery_object_positions', 'comment' => 'something_11', 'created_at' => $this->now],
            ['id' => 5, 'name' => 'object_rarities', 'comment' => 'something_12', 'created_at' => $this->now],
            ['id' => 6, 'name' => 'object_types', 'comment' => 'something_13', 'created_at' => $this->now],
            ['id' => 7, 'name' => 'object_interactions', 'comment' => 'something_10', 'created_at' => $this->now],
            ['id' => 8, 'name' => 'item_appearances', 'comment' => 'Tipos aparecion de Items', 'created_at' => $this->now],
            ['id' => 9, 'name' => 'item_captures', 'comment' => 'Tipos captura de Items', 'created_at' => $this->now],
            ['id' => 10, 'name' => 'avatars', 'comment' => 'Personajes', 'created_at' => $this->now],
            ['id' => 11, 'name' => 'npc_types', 'comment' => 'Tipos de NPC', 'created_at' => $this->now],
            ['id' => 12, 'name' => 'npc_sign_types', 'comment' => 'Tipos de carteles de los NPC', 'created_at' => $this->now],
            ['id' => 13, 'name' => 'catalogue_categories', 'comment' => 'Categorias de catalago', 'created_at' => $this->now],
            ['id' => 14, 'name' => 'friend_icons', 'comment' => 'Iconos de amigos de la BPad', 'created_at' => $this->now],
            ['id' => 15, 'name' => 'effects', 'comment' => 'Efectos o pociones', 'created_at' => $this->now],
            ['id' => 16, 'name' => 'mini_games', 'comment' => 'MiniJuegos tabla', 'created_at' => $this->now],
            ['id' => 17, 'name' => 'island_types', 'comment' => 'Tipos de Isla', 'created_at' => $this->now],
            ['id' => 18, 'name' => 'escenary_types', 'comment' => 'Tipos de escenarios', 'created_at' => $this->now],
            ['id' => 19, 'name' => 'scenery_floor_indicators', 'comment' => 'Tipos de indicadores en suelo de un escenario', 'created_at' => $this->now],
        ]);
    }
}
