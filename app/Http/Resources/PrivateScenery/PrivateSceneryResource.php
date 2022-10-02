<?php

namespace App\Http\Resources\PrivateScenery;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SceneryIndicatorsCollection;

class PrivateSceneryResource extends JsonResource
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
            'parameter_scenery' => $this->scenery->parameter,
            'category' => $this->menuCategory->parameter,
            'es_category' => $this->scenery->scenaryType->parameter,
            'position_x' => $this->position_x,
            'position_y' => $this->position_y,
            'max_visitors' => $this->max_visitors,
            'price_uppercut' => $this->price_uppercut,
            'price_coconut' => $this->price_coconut,
            'bit_map' => $this->scenery->bit_map,
        ];
    }
}
