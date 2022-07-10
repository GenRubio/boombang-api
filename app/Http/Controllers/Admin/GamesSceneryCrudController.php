<?php

namespace App\Http\Controllers\Admin;

use App\Models\MenuCategory;
use App\Models\SceneryModel;
use App\Http\Requests\GamesSceneryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GamesSceneryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GamesSceneryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\GamesScenery::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/games-scenery');
        CRUD::setEntityNameStrings('games scenery', 'games sceneries');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'id',
            'label' => 'ID',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'model',
            'label' => 'Modelo',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Nombre',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'menuCategory',
            'label' => 'Tipo Area',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => MenuCategory::class,
        ]);
        $this->crud->addColumn([
            'name' => 'sceneryModel',
            'label' => 'Tipo Escenario',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => SceneryModel::class,
        ]);
        $this->crud->addColumn([
            'name' => 'order',
            'label' => 'Orden',
            'type'  => 'text',
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
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(GamesSceneryRequest::class);

        $this->crud->addFields([
            [
                'name' => 'menu_category_id',
                'type' => 'hidden',
                'value' => 3,
            ],
            [
                'name' => 'scenery_model_id',
                'type' => 'hidden',
                'value' => 1,
            ],
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Nombre',
            ],
            [
                'name' => 'model',
                'type' => 'number',
                'label' => 'Modelo',
                'default' => 1
            ],
            [
                'name' => 'file_name',
                'type' => 'text',
                'label' => 'Nombre archivo',
            ],
            [
                'name' => 'file_path',
                'type' => 'text',
                'label' => 'Ruta archivo',
            ],
            [
                'name' => 'bit_map',
                'type' => 'textarea',
                'label' => 'Mapa Bits',
            ],
            [
                'name' => 'position_x',
                'type' => 'number',
                'label' => 'Posicion entrada X',
                'default' => 11
            ],
            [
                'name' => 'position_y',
                'type' => 'number',
                'label' => 'Posicion entrada Y',
                'default' => 11
            ],
            [
                'name' => 'max_visitors',
                'type' => 'number',
                'label' => 'Maximo usuarios en sala permitidos',
                'default' => 12
            ],
            [
                'name' => 'price_uppercut',
                'type' => 'number',
                'label' => 'Precio uppercut en sala',
                'default' => 250
            ],
            [
                'name' => 'price_coconut',
                'type' => 'number',
                'label' => 'Precio coco en sala',
                'default' => 25
            ],
            [
                'name' => 'order',
                'type' => 'number',
                'label' => 'Orden',
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

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function store()
    {
        return $this->traitStore();
    }
}
