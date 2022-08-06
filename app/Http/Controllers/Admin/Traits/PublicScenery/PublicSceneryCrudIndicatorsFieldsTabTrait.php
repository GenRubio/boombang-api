<?php

namespace App\Http\Controllers\Admin\Traits\PublicScenery;

trait PublicSceneryCrudIndicatorsFieldsTabTrait
{
    private function setIndicatorsFieldsTab()
    {
        $indicators = [];
        foreach ($this->sceneryFloorIndicatorService->getAll() as $indicator) {
            $indicators[$indicator->id] = $indicator->name;
        }
        $publicSceneries = [];
        foreach ($this->publicSceneryService->getAll() as $scenery) {
            $publicSceneries[$scenery->id] = $scenery->name;
        }
        $characterLooks = [];
        foreach ($this->characterLookService->getAll() as $look) {
            $characterLooks[$look->id] = $look->name;
        }

        $sceneryIndicators = $this->crud->getCurrentEntry()->indicators;
        $indicatorsToEdit = [];
        foreach ($sceneryIndicators as $indicator) {
            $indicatorsToEdit[] = [
                'param_scenery_floor_indicator_id' => $indicator->pivot->param_scenery_floor_indicator_id,
                'indicator_position_x' => $indicator->pivot->indicator_position_x,
                'indicator_position_y' => $indicator->pivot->indicator_position_y,
                'next_scenery_id' => $indicator->pivot->next_scenery_id,
                'next_scenery_position_x' => $indicator->pivot->next_scenery_position_x,
                'next_scenery_position_y' => $indicator->pivot->next_scenery_position_y,
                'next_scenery_position_z' => $indicator->pivot->next_scenery_position_z
            ];
        }

        $jsonIndicators = json_encode($indicatorsToEdit);
        $this->crud->addFields([
            [
                'name'  => 'floor_indicators',
                'label' => 'Indicadores',
                'type'  => 'repeatable',
                'value' => $jsonIndicators,
                'fields' => [
                    [
                        'name' => 'public_scenery_id',
                        'type' => 'hidden',
                        'value' => $this->crud->getCurrentEntry()->id
                    ],
                    [
                        'name' => 'param_scenery_floor_indicator_id',
                        'label' => "Indicador",
                        'type' => 'select2_from_array',
                        'options' => $indicators,
                        'allows_null' => false,
                        'wrapper' => ['class' => 'form-group col-md-6'],
                    ],
                    [
                        'name'    => 'indicator_position_x',
                        'type'    => 'number',
                        'label'   => 'Posicion X',
                        'default' => 11,
                        'wrapper' => ['class' => 'form-group col-md-3'],
                    ],
                    [
                        'name'    => 'indicator_position_y',
                        'type'    => 'number',
                        'label'   => 'Posicion Y',
                        'default' => 11,
                        'wrapper' => ['class' => 'form-group col-md-3'],
                    ],
                    [
                        'name'  => 'separator',
                        'type'  => 'custom_html',
                        'value' => '<hr>'
                    ],
                    [
                        'name' => 'next_scenery_id',
                        'label' => "Escenario aparecion",
                        'type' => 'select2_from_array',
                        'options' => $publicSceneries,
                        'allows_null' => false,
                        'wrapper' => ['class' => 'form-group col-md-6'],
                    ],
                    [
                        'name'    => 'next_scenery_position_x',
                        'type'    => 'number',
                        'label'   => 'Posicion X',
                        'default' => 11,
                        'wrapper' => ['class' => 'form-group col-md-3'],
                    ],
                    [
                        'name'    => 'next_scenery_position_y',
                        'type'    => 'number',
                        'label'   => 'Posicion Y',
                        'default' => 11,
                        'wrapper' => ['class' => 'form-group col-md-3'],
                    ],
                    [
                        'name'    => 'next_scenery_position_z',
                        'label'   => 'Mirada personaje',
                        'type' => 'select2_from_array',
                        'options' => $characterLooks,
                        'allows_null' => false,
                        'wrapper' => ['class' => 'form-group col-md-4'],
                    ],
                ],
                'new_item_label'  => 'Añadir indicador',
                'init_rows' => 0,
                'tab' => 'Indicadores'
            ],
        ]);
    }
}
