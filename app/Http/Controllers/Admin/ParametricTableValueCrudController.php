<?php

namespace App\Http\Controllers\Admin;

use App\Models\ParametricTable;
use App\Http\Requests\ParametricTableValueRequest;
use App\Services\ParametricTableService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ParametricTableValueCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\ParametricTableValue::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/parametric-table-value');
        CRUD::setEntityNameStrings('valor', 'valores');
        $this->parametricTableService = new ParametricTableService();
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'id',
            'label' => 'ID',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'parametricTable',
            'label' => 'Tabla',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => ParametricTable::class,
        ]);
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Nombre',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'parameter',
            'label' => 'Parametro',
            'type'  => 'text',
        ]);

        $this->setFilters();
    }

    private function setFilters()
    {
        $this->crud->addFilter([
            'name' => 'parametric_table_id',
            'type' => 'select2',
            'label' => 'Tablas parametricas',
        ], function () {
            $data = [];
            foreach ($this->parametricTableService->getAll() as $parametricTable) {
                $data[$parametricTable->id] = $parametricTable->name;
            }
            return $data;
        }, function ($value) {
            $this->crud->addClause('where', 'parametric_table_id', $value);
        });
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ParametricTableValueRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Nombre',
            ],
            [
                'label'     => "Tabla",
                'type'      => 'select2',
                'name'      => 'parametric_table_id',
                'entity'    => 'parametricTable',
                'model'     => "App\Models\ParametricTable",
                'attribute' => 'name',
            ],
            [
                'name' => 'parameter',
                'type' => 'number',
                'label' => 'Parametro',
                'default' => 1
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
