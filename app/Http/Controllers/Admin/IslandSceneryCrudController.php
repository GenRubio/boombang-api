<?php

namespace App\Http\Controllers\Admin;

use App\Models\Scenery;
use App\Models\Parametric\IslandType;
use App\Models\Parametric\MenuCategory;
use App\Models\Parametric\SceneryModel;
use App\Http\Requests\IslandSceneryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class IslandSceneryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\IslandScenery::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/island-scenery');
        CRUD::setEntityNameStrings('escenario', 'escenarios islas');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'id',
            'label' => 'ID',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'scenery',
            'label' => 'Escenario',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => Scenery::class,
        ]);
        $this->crud->addColumn([
            'name' => 'islandType',
            'label' => 'Tipo isla',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => IslandType::class,
        ]);
        $this->crud->addColumn([
            'name' => 'menuCategory',
            'label' => 'Categoria',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => MenuCategory::class,
        ]);
        $this->crud->addColumn([
            'name' => 'sceneryModel',
            'label' => 'Modelo',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => SceneryModel::class,
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(IslandSceneryRequest::class);

        $this->crud->addFields([
            [
                'label'     => "Escenario",
                'type'      => 'select2',
                'name'      => 'scenery_id',
                'entity'    => 'scenery',
                'model'     => Scenery::class,
                'attribute' => 'name',
            ],
            [
                'label'     => "Tipo isla",
                'type'      => 'select2',
                'name'      => 'island_type_id',
                'entity'    => 'islandType',
                'model'     => IslandType::class,
                'attribute' => 'name',
            ],
            [
                'label'     => "Categoria",
                'type'      => 'select2',
                'name'      => 'menu_category_id',
                'entity'    => 'menuCategory',
                'model'     => MenuCategory::class,
                'attribute' => 'name',
                'attributes' => [
                    'readonly'    => 'readonly',
                    'disabled'    => 'disabled',
                ],
                'value' => 2
            ], 
            [
                'label'     => "Modelo",
                'type'      => 'select2',
                'name'      => 'scenery_model_id',
                'entity'    => 'sceneryModel',
                'model'     => SceneryModel::class,
                'attribute' => 'name',
                'attributes' => [
                    'readonly'    => 'readonly',
                    'disabled'    => 'disabled',
                ],
                'value' => 7
            ],
            [
                'name' => 'position_x',
                'label' => 'Posicion entrada X',
                'type' => 'number',
                'default' => 11
            ],
            [
                'name' => 'position_y',
                'label' => 'Posicion entrada Y',
                'type' => 'number',
                'default' => 11
            ],
            [
                'name' => 'max_visitors',
                'label' => 'Maximo jugadores en escenario',
                'type' => 'number',
                'default' => 12
            ],
            [
                'name' => 'price_uppercut',
                'label' => 'Precio uppercut',
                'type' => 'number',
                'default' => 250
            ],
            [
                'name' => 'price_coconut',
                'label' => 'Precio coco',
                'type' => 'number',
                'default' => 25
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
