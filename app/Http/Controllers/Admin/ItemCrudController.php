<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ItemRequest;
use App\Models\Parametric\ItemCapture;
use App\Models\Parametric\ItemAppearance;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ItemCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Item::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/item');
        CRUD::setEntityNameStrings('item', 'items');
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
            'name' => 'name',
            'label' => 'Nombre',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'itemAppearance',
            'label' => 'Aparicion',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => ItemAppearance::class,
        ]);
        $this->crud->addColumn([
            'name' => 'itemCapture',
            'label' => 'Tipo captura',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => ItemCapture::class,
        ]);
        $this->crud->addColumn([
            'name' => 'active',
            'type' => 'btnToggle',
            'label' => 'Activo',
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ItemRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Nombre',
                'type' => 'text',
            ],
            [
                'name' => 'image',
                'label' => 'Imagen',
                'type' => 'image',
            ],
            [
                'label'     => "Tipo Aparicion",
                'type'      => 'select2',
                'name'      => 'param_item_appearance_id',
                'entity'    => 'itemAppearance',
                'model'     => ItemAppearance::class,
                'attribute' => 'name',
            ],
            [
                'label'     => "Tipo captura",
                'type'      => 'select2',
                'name'      => 'param_item_capture_id',
                'entity'    => 'itemCapture',
                'model'     => ItemCapture::class,
                'attribute' => 'name',
            ],
            [
                'name' => 'appearance_time',
                'label' => 'Tiempo aparicion',
                'type' => 'number',
                'default' => 20
            ],
            [
                'name' => 'parameter',
                'label' => 'Parametro',
                'type' => 'text',
            ],
            [
                'name' => 'throw_in_all_public_sceneries',
                'type' => 'checkbox',
                'label' => 'Lanzar en todos escenarios publicos',
                'default' => true,
            ],
            [
                'name' => 'throw_in_private_sceneries',
                'type' => 'checkbox',
                'label' => 'Lanzar en todos escenarios privados',
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
