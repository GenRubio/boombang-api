<?php

namespace App\Http\Controllers\Admin;

use App\Models\Scenery;
use App\Enums\ParametricEnum;
use App\Models\Parametric\MenuCategory;
use App\Http\Requests\PublicSceneryRequest;
use App\Services\Parametric\MenuCategoryService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class PublicSceneryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\PublicScenery::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/public-scenery');
        CRUD::setEntityNameStrings('escenario', 'escenarios areas');
        $this->menuCategoryService = new MenuCategoryService();
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'id',
            'label' => 'ID',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Nombre',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'menuCategory',
            'label' => 'Categoria',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => MenuCategory::class,
        ]);
        $this->crud->addColumn([
            'name' => 'scenery',
            'label' => 'Escenario',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => Scenery::class,
        ]);
        $this->crud->addColumn([
            'name' => 'visible',
            'type' => 'btnToggle',
            'label' => 'Visible',
        ]);
        $this->crud->addColumn([
            'name' => 'active',
            'type' => 'btnToggle',
            'label' => 'Activo',
        ]);

        $this->setFilters();
    }

    private function setFilters()
    {
        $this->crud->addFilter([
            'name' => 'param_menu_category_id',
            'type' => 'select2',
            'label' => 'Categorias',
        ], function () {
            $data = [];
            foreach ($this->menuCategoryService->getAll() as $menuCategory) {
                if (
                    $menuCategory->id == ParametricEnum::MENU_CATEGORIES['AREA']
                    || $menuCategory->id == ParametricEnum::MENU_CATEGORIES['GAME']
                ) {
                    $data[$menuCategory->id] = $menuCategory->name;
                }
            }
            return $data;
        }, function ($value) {
            $this->crud->addClause('where', 'param_menu_category_id', $value);
        });
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(PublicSceneryRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Nombre',
                'type' => 'text',
            ],
            [
                'label'     => "Escenario",
                'type'      => 'select2',
                'name'      => 'scenery_id',
                'entity'    => 'scenery',
                'model'     => Scenery::class,
                'attribute' => 'name',
                'options'   => (function ($query) {
                    return $query->where('param_scenary_type_id', ParametricEnum::SCENERY_TYPES['PUBLIC'])
                        ->get();
                }),
            ],
            [
                'label'     => "Categoria",
                'type'      => 'select2',
                'name'      => 'param_menu_category_id',
                'entity'    => 'menuCategory',
                'model'     => MenuCategory::class,
                'attribute' => 'name',
                'options'   => (function ($query) {
                    return $query->where('id', ParametricEnum::MENU_CATEGORIES['AREA'])
                        ->orWhere('id', ParametricEnum::MENU_CATEGORIES['GAME'])
                        ->get();
                }),
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
            [
                'name' => 'visible',
                'type' => 'checkbox',
                'label' => 'Visible',
                'default' => true
            ],
            [
                'name' => 'active',
                'type' => 'checkbox',
                'label' => 'Activo',
                'default' => true
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupReorderOperation()
    {
        $this->crud->set('reorder.label', 'name');
        $this->crud->set('reorder.max_level', 0);
    }
}
