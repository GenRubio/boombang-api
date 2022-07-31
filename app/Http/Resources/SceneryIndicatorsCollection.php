<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\Parametric\CharacterLookService;

class SceneryIndicatorsCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $response = [];
        $this->characterLooks = (new CharacterLookService())->getAll();
        foreach ($this->all() as $indicator) {
            $response[] = [
                'parameter_indicator' => $indicator->parameter,
                'next_scenery_id' => $indicator->pivot->next_scenery_id,
                'indicator_position_x' => $indicator->pivot->indicator_position_x,
                'indicator_position_y' => $indicator->pivot->indicator_position_y,
                'next_scenery_position_x' => $indicator->pivot->next_scenery_position_x,
                'next_scenery_position_y' => $indicator->pivot->next_scenery_position_y,
                'next_scenery_position_z' => $this->getCharacterLookParameter($indicator->pivot->next_scenery_position_z),
            ];
        }

        return $response;
    }

    private function getCharacterLookParameter($id)
    {
        return $this->characterLooks->where('id', $id)->first()->parameter;
    }
}
