<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SceneryRequest;
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
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'id',
            'label' => 'ID',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'parameter',
            'label' => 'Parametro',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'file_name',
            'label' => 'Nombre archivo',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'file_path',
            'label' => 'Ubicacion archivo',
            'type'  => 'text',
        ]);
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
                'name' => 'file_name',
                'label' => 'Nombre archivo',
                'type' => 'text',
            ],
            [
                'name' => 'file_path',
                'label' => 'Ubicacion archivo',
                'type' => 'textarea',
            ],
            [
                'name' => 'bit_map',
                'label' => 'Mapa Bits',
                'type' => 'textarea',
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
