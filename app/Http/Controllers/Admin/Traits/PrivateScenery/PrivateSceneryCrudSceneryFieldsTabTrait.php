<?php

namespace App\Http\Controllers\Admin\Traits\PrivateScenery;

use App\Models\Scenery;
use App\Enums\ParametricEnum;
use App\Models\Parametric\MenuCategory;

trait PrivateSceneryCrudSceneryFieldsTabTrait
{
    private function setSceneryFieldsTab()
    {
        $this->crud->addFields([
            [
                'label'     => "Escenario",
                'type'      => 'select2',
                'name'      => 'scenery_id',
                'entity'    => 'scenery',
                'model'     => Scenery::class,
                'attribute' => 'name',
                'options'   => (function ($query) {
                    return $query->where('param_scenary_type_id', ParametricEnum::SCENERY_TYPES['PRIVATE'])
                        ->get();
                }),
                'tab' => 'Escenario'
            ],
            [
                'label'     => "Categoria",
                'type'      => 'select2',
                'name'      => 'param_menu_category_id',
                'entity'    => 'menuCategory',
                'model'     => MenuCategory::class,
                'attribute' => 'name',
                'options'   => (function ($query) {
                    return $query->whereIn('id', ParametricEnum::PRIVATE_SCENERY_MENU_CATEGORIES)
                        ->get();
                }),
                'tab' => 'Escenario'
            ],
            [
                'name' => 'position_x',
                'label' => 'Posicion entrada X',
                'type' => 'number',
                'default' => 11,
                'tab' => 'Escenario'
            ],
            [
                'name' => 'position_y',
                'label' => 'Posicion entrada Y',
                'type' => 'number',
                'default' => 11,
                'tab' => 'Escenario'
            ],
            [
                'name' => 'max_visitors',
                'label' => 'Maximo jugadores en escenario',
                'type' => 'number',
                'default' => 12,
                'tab' => 'Escenario'
            ],
            [
                'name' => 'price_uppercut',
                'label' => 'Precio uppercut',
                'type' => 'number',
                'default' => 250,
                'tab' => 'Escenario'
            ],
            [
                'name' => 'price_coconut',
                'label' => 'Precio coco',
                'type' => 'number',
                'default' => 25,
                'tab' => 'Escenario'
            ],
            [
                'name' => 'active',
                'type' => 'checkbox',
                'label' => 'Activo',
                'default' => true,
                'tab' => 'Escenario'
            ],
        ]);
    }
}
