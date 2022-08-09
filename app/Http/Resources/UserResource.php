<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'security_code' => $this->security_code,
            'user_age' => $this->user_age,
            'coins_gold' => $this->coins_gold,
            'coins_silver' => $this->coins_silver,
            'vip' => $this->vip,
            'admin' => $this->admin,
            'register_ip' => $this->register_ip,
            'current_ip' => $this->current_ip,
            'last_connection_date' => $this->last_connection_date,
            'default_locale' => $this->default_locale,
            'data_user' => self::dataUserResource($this->dataUser)
        ];
    }

    private function dataUserResource($dataUser)
    {
        return [
            'avatar' => $dataUser->avatar->parameter,
            'avatar_colors_hex' => $dataUser->avatar_colors_hex,
            'description' => $dataUser->description,
            'kisses_sent' => $dataUser->kisses_sent,
            'kisses_received' => $dataUser->kisses_received,
            'juices_sent' => $dataUser->juices_sent,
            'juices_received' => $dataUser->juices_received,
            'flowers_sent' => $dataUser->flowers_sent,
            'flores_recibidas' => $dataUser->flores_recibidas,
            'uppers_sent' => $dataUser->uppers_sent,
            'uppers_received' => $dataUser->uppers_received,
            'coconuts_sent' => $dataUser->coconuts_sent,
            'coconuts_received' => $dataUser->coconuts_received,
            'hobby_1' => $dataUser->hobby_1,
            'hobby_2' => $dataUser->hobby_2,
            'hobby_3' => $dataUser->hobby_3,
            'wish_1' => $dataUser->wish_1,
            'wish_2' => $dataUser->wish_2,
            'wish_3' => $dataUser->wish_3,
            'votes_legal' => $dataUser->votes_legal,
            'votes_sexy' => $dataUser->votes_sexy,
            'votes_nice' => $dataUser->votes_nice,
            'points_ring' => $dataUser->points_ring,
            'points_crazy_coconuts' => $dataUser->points_crazy_coconuts,
            'points_hidden_path' => $dataUser->points_hidden_path,
            'points_ninja_way' => $dataUser->points_ninja_way,
        ];
    }
}
