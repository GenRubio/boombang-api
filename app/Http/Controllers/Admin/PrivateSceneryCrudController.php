<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ParametricEnum;
use App\Http\Requests\PrivateSceneryRequest;
use App\Services\Parametric\MenuCategoryService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class PrivateSceneryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\PrivateScenery::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/private-scenery');
        CRUD::setEntityNameStrings('escenario', 'escenarios privados');
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
            'name' => 'scenery',
            'label' => 'Escenario',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => Scenery::class,
        ]);
        $this->crud->addColumn([
            'name' => 'menuCategory',
            'label' => 'Categoria',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => MenuCategory::class,
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
                if (in_array($menuCategory->id, ParametricEnum::PRIVATE_SCENERY_MENU_CATEGORIES)) {
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
        CRUD::setValidation(PrivateSceneryRequest::class);

        CRUD::field('id');
        CRUD::field('param_menu_category_id');
        CRUD::field('scenery_id');
        CRUD::field('position_x');
        CRUD::field('position_y');
        CRUD::field('max_visitors');
        CRUD::field('price_uppercut');
        CRUD::field('price_coconut');
        CRUD::field('active');
        CRUD::field('created_at');
        CRUD::field('updated_at');

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
