<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

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
            'name' => 'email',
            'label' => 'Email',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'coins_gold',
            'label' => 'Creditos Oro',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'coins_silver',
            'label' => 'Creditos Plata',
            'type'  => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'admin',
            'type' => 'btnToggle',
            'label' => 'Administrador',
        ]);
        $this->crud->addColumn([
            'name' => 'active',
            'type' => 'btnToggle',
            'label' => 'Activo',
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        $this->userTab();
    }

    private function userTab()
    {
        $tab = 'User';
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Nombre',
                'type' => 'text',
                'tab' => $tab
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'text',
                'tab' => $tab
            ],
            [
                'name' => 'password',
                'label' => 'Contraseña',
                'type' => 'password',
                'tab' => $tab
            ],
            [
                'name' => 'security_code',
                'label' => 'Codigo de seguridad',
                'type' => 'password',
                'tab' => $tab
            ],
            [
                'name' => 'user_age',
                'label' => 'Edad',
                'type' => 'number',
                'default' => 14,
                'tab' => $tab
            ],
            [
                'name' => 'coins_gold',
                'label' => 'Creditos de oro',
                'type' => 'number',
                'default' => 0,
                'tab' => $tab
            ],
            [
                'name' => 'coins_silver',
                'label' => 'Creditos de plata',
                'type' => 'number',
                'default' => 0,
                'tab' => $tab
            ],
            [
                'name' => 'vip',
                'label' => 'VIP',
                'type' => 'datetime',
                'tab' => $tab
            ],
            [
                'name' => 'register_ip',
                'label' => 'IP de registro',
                'type' => 'text',
                'tab' => $tab
            ],
            [
                'name' => 'current_ip',
                'label' => 'IP actual',
                'type' => 'text',
                'tab' => $tab
            ],
            [
                'name' => 'last_connection_date',
                'label' => 'Ultima conexion',
                'type' => 'datetime',
                'tab' => $tab
            ],
            [
                'name' => 'admin',
                'type' => 'checkbox',
                'label' => 'Administrador',
                'tab' => $tab
            ],
            [
                'name' => 'active',
                'type' => 'checkbox',
                'label' => 'Activo',
                'tab' => $tab
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
