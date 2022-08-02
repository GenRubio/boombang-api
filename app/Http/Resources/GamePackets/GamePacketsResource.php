<?php

namespace App\Http\Resources\GamePackets;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GamePackets\Packets\ItemsPacketResource;
use App\Http\Resources\GamePackets\Packets\LoginPacketResource;

class GamePacketsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'login_packet' => (new LoginPacketResource(null))->response(),
            'scenery_item_packet' => (new ItemsPacketResource(null))->response(),
        ];
    }
}
