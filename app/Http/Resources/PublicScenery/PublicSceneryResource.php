<?php

namespace App\Http\Resources\PublicScenery;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicSceneryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'model' => $this->scenery->parameter,
            'category' => $this->menuCategory->parameter,
            'es_category' => $this->scenery->scenaryType->parameter,
            'name' => $this->name,
            'position_x' => $this->position_x,
            'position_y' => $this->position_y,
            'max_visitors' => $this->max_visitors,
            'price_uppercut' => $this->price_uppercut,
            'price_coconut' => $this->price_coconut,
            'visible' => $this->visible
        ];
    }
}
