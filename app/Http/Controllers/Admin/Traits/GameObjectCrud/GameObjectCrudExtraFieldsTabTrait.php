<?php

namespace App\Http\Controllers\Admin\Traits\GameObjectCrud;

use App\Models\Parametric\SceneryObjectType;
use App\Models\Parametric\SceneryObjectPosition;

trait GameObjectCrudExtraFieldsTabTrait
{
    private function setExtraInformationFieldsTab()
    {
        $this->crud->addFields([
            [
                'label'     => "Posiciones en escenario",
                'type'      => 'select2_multiple',
                'name'      => 'sceneryObjectPositions',
                'entity'    => 'sceneryObjectPositions',
                'model'     =>  SceneryObjectPosition::class,
                'attribute' => 'name',
                'tab' => 'Otros'
            ],
            [
                'label'     => "Tipos de escenarios",
                'type'      => 'select2_multiple',
                'name'      => 'sceneryObjectTypes',
                'entity'    => 'sceneryObjectTypes',
                'model'     =>  SceneryObjectType::class,
                'attribute' => 'name',
                'tab' => 'Otros'
            ],
        ]);
    }
}
