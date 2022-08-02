<?php

namespace App\Http\Resources\GamePackets\Packets;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GamePackets\GamePacketsResource;

class ItemsPacketResource extends GamePacketsResource
{

    public function response($request = null)
    {
        return [
            'id' => 200,
            'type' => 120,
            'description' => "Packet para lanzar items en escenario",
            'parameters' => [
                'param_1' => 'Item random Key',
                'param_2' => 'items.id',
                'param_3' => 'Location X',
                'param_4' => 'Location Y',
                'param_5' => 'items.parameter',
                'param_6' => 'items.param_item_appearance_id',
                'param_7' => 'items.param_item_capture_id',
                'param_8' => 'items.appearance_time',
            ]
        ];
    }
}
