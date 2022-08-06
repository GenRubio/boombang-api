<?php

namespace App\Http\Controllers\Admin\Traits\PublicScenery;

use App\Models\Scenery;
use App\Enums\ParametricEnum;
use App\Models\Parametric\MenuCategory;

trait PublicSceneryCrudListOperationTrait
{
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
                if (in_array($menuCategory->id, ParametricEnum::PUBLIC_SCENERY_MENU_CATEGORIES)) {
                    $data[$menuCategory->id] = $menuCategory->name;
                }
            }
            return $data;
        }, function ($value) {
            $this->crud->addClause('where', 'param_menu_category_id', $value);
        });
    }
}
