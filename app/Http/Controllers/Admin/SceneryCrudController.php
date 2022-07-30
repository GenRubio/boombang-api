<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SceneryRequest;
use App\Models\Parametric\SceneryType;
use App\Services\Parametric\SceneryTypeService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class SceneryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Scenery::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/scenery');
        CRUD::setEntityNameStrings('escenario', 'escenarios');
        $this->sceneryTypeService = new SceneryTypeService();
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'id',
            'label' => 'ID',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'scenaryType',
            'label' => 'Tipo',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => SceneryType::class,
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
            'name' => 'param_scenary_type_id',
            'type' => 'select2',
            'label' => 'Tipos',
        ], function () {
            $data = [];
            foreach ($this->sceneryTypeService->getAll() as $sceneryType) {
                $data[$sceneryType->id] = $sceneryType->name;
            }
            return $data;
        }, function ($value) {
            $this->crud->addClause('where', 'param_scenary_type_id', $value);
        });
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(SceneryRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Nombre',
                'type' => 'text',
            ],
            [
                'label'     => "Tipo",
                'type'      => 'select2',
                'name'      => 'param_scenary_type_id',
                'entity'    => 'scenaryType',
                'model'     => SceneryType::class,
                'attribute' => 'name',
            ],
            [
                'name' => 'file_name',
                'label' => 'Nombre archivo',
                'type' => 'text',
            ],
            [
                'name' => 'file_path',
                'label' => 'Ruta archivo',
                'type' => 'text',
            ],
            [
                'name' => 'bit_map',
                'label' => 'Mapa Bits',
                'type' => 'textarea',
            ],
            [
                'name' => 'parameter',
                'label' => 'Parametro',
                'type' => 'text',
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
