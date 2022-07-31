<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $inserts = [];
        $images = Storage::disk('items_images')->files();
        foreach($images as $image){
            $inserts[] = [
                'param_item_appearance_id' => 29,
                'param_item_capture_id' => 30,
                'name' => $image,
                'image' => "images/scenery/items/{$image}",
                'parameter' => 0,
                'appearance_time' => 20,
                'throw_in_public_sceneries' => true,
                'throw_in_private_sceneries' => true,
                'active' => false,
            ];
        }
        DB::table('items')->insert($inserts);
    }
}
