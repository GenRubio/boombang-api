<?php

namespace App\Http\Resources\GamePackets\Packets;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GamePackets\GamePacketsResource;

class LoginPacketResource extends GamePacketsResource
{

    public function response($request = null)
    {
        return [
            'id' => 120,
            'type' => 121,
            'description' => "Packet para cargar el usuario despues de hacer el login",
            'parameters' => [
                'param_1' => 1,
                'param_2' => 'users.name',
                'param_3' => 'data_users.avatar_id',
                'param_4' => 'data_users.avatar_colors_hex',
                'param_5' => 'users.email',
                'param_6' => 'users.user_age',
                'param_7' => '2',
                'param_8' => "BoomBang",
                'param_9' => '0',
                'param_10' => 'users.id',
                'param_11' => 'users.admin',
                'param_12' => 'users.coins_gold',
                'param_13' => 'users.coins_silver',
                'param_14' => '200',
                'param_15' => '5',
                'param_16' => '0',
                'param_17' => '-1',
                'param_18' => '-1',
                'param_19' => '0',
                'param_20' => '-1',
                'param_21' => "ES",
                'param_22' => '0',
                'param_23' => '0',
                'param_24' => 'users.vip',
                'param_25' => 'users.vip',
                'param_26' => '1',
                'param_27' => '0',
                'param_28' => '0',
                'param_29' => '0',
                'param_30' => '1²0',
                'param_31' => '0',
                'param_32' => '0',
            ]
        ];
    }
}
