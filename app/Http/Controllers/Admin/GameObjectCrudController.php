<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GameObjectRequest;
use App\Models\Parametric\ObjectInteraction;
use App\Models\Parametric\ObjectRarity;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class GameObjectCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\GameObject::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/game-object');
        CRUD::setEntityNameStrings('objeto', 'objetos');
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
            'name' => 'description',
            'label' => 'Descripcion',
            'type'  => 'text',
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(GameObjectRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Nombre',
                'type' => 'text',
            ],
            [
                'name' => 'description',
                'label' => 'Descripcion',
                'type' => 'textarea',
            ],
            [
                'name' => 'image',
                'label' => 'Imagen',
                'type' => 'image',
            ],
            [
                'label'     => "Tipo de rareza",
                'type'      => 'select2',
                'name'      => 'object_rarity_id',
                'entity'    => 'objectRaritie',
                'model'     => ObjectRarity::class,
                'attribute' => 'name',
            ],
            [
                'label'     => "Tipo de interaccion",
                'type'      => 'select2',
                'name'      => 'object_interaction_id',
                'entity'    => 'objectInteraction',
                'model'     => ObjectInteraction::class,
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
                'name' => 'colors_hex',
                'label' => 'Colores hexadecimal',
                'type' => 'text',
            ],
            [
                'name' => 'colors_rgb',
                'label' => 'Colores RGB',
                'type' => 'text',
            ],
            [
                'name' => 'size_big',
                'label' => 'Tamaño grande',
                'type' => 'text',
            ],
            [
                'name' => 'size_medium',
                'label' => 'Tamaño medio',
                'type' => 'text',
            ],
            [
                'name' => 'size_small',
                'label' => 'Tamaño pequeño',
                'type' => 'text',
            ],
        ]);

        CRUD::field('bit_map_size_big');
        CRUD::field('bit_map_size_medium');
        CRUD::field('bit_map_size_small');
        CRUD::field('walk_over_size_big');
        CRUD::field('walk_over_size_medium');
        CRUD::field('walk_over_size_small');
        CRUD::field('undefined_14');
        CRUD::field('undefined_16');
        CRUD::field('undefined_17');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
