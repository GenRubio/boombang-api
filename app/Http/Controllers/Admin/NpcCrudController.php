<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NpcRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class NpcCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Npc::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/npc');
        CRUD::setEntityNameStrings('npc', 'npcs');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'id',
            'label' => 'ID',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'Imagen',
            'type'  => 'image',
        ]);
        $this->crud->addColumn([
            'name' => 'file_name',
            'label' => 'Nombre archivo',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'parameter',
            'label' => 'Parametro',
            'type'  => 'text',
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(NpcRequest::class);

        $this->crud->addFields([
            [
                'name' => 'image',
                'label' => 'Imagen',
                'type' => 'image',
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
                'name' => 'parameter',
                'label' => 'Parametro',
                'type' => 'text',
                'default' => "0"
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
