<?php

namespace App\Http\Controllers\Admin;

use App\Models\GameObject;
use App\Models\Parametric\CatalogueCategory;
use App\Http\Requests\CatalogueGameObjectRequest;
use App\Services\Parametric\CatalogueCategoryService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CatalogueGameObjectCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\CatalogueGameObject::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/catalogue-game-object');
        CRUD::setEntityNameStrings('objeto', 'objetos del catalago');
        $this->catalogueCategoryService = new CatalogueCategoryService();
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'id',
            'label' => 'ID',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'game_object_id',
            'label' => 'Objeto',
            'type' => 'relationship',
            'attribute' => 'name',
            'entity'    => 'object',
            'model' => GameObject::class,
        ]);
        $this->crud->addColumn([
            'name' => 'param_catalogue_category_id',
            'label' => 'Categoria',
            'type' => 'relationship',
            'attribute' => 'name',
            'entity'    => 'category',
            'model' => CatalogueCategory::class,
        ]);
        $this->crud->addColumn([
            'name' => 'price_gold',
            'label' => 'Precio oro',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'price_silver',
            'label' => 'Precio plata',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'vip',
            'type' => 'btnToggle',
            'label' => 'Vip',
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
            'name' => 'param_catalogue_category_id',
            'type' => 'select2',
            'label' => 'Categorias',
        ], function () {
            $data = [];
            foreach ($this->catalogueCategoryService->getAll() as $category) {
                $data[$category->id] = $category->name;
            }
            return $data;
        }, function ($value) {
            $this->crud->addClause('where', 'param_catalogue_category_id', $value);
        });
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CatalogueGameObjectRequest::class);

        $this->crud->addFields([
            [
                'label'     => "Objeto",
                'type'      => 'select2',
                'name'      => 'game_object_id',
                'entity'    => 'object',
                'model'     => GameObject::class,
                'attribute' => 'name',
            ],
            [
                'label'     => "Categoria",
                'type'      => 'select2',
                'name'      => 'param_catalogue_category_id',
                'entity'    => 'category',
                'model'     => CatalogueCategory::class,
                'attribute' => 'name',
            ],
            [
                'name' => 'price_gold',
                'label' => 'Precio oro',
                'suffix' => 'creditos oro',
                'type' => 'number',
                'default' => 1000
            ],
            [
                'name' => 'price_silver',
                'label' => 'Precio plata',
                'suffix' => 'creditos plata',
                'type' => 'number',
                'default' => -1
            ],
            [
                'name' => 'vip',
                'type' => 'checkbox',
                'label' => 'Vip',
                'default' => true,
            ],
            [
                'name' => 'active',
                'type' => 'checkbox',
                'label' => 'Activo',
                'default' => true,
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
