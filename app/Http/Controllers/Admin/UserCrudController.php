<?php

namespace App\Http\Controllers\Admin;

use App\Tasks\CreateDataUserTask;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
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
        $this->crud->setRequest($this->handlePasswordInput(request()));
        $this->setFields();
    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(UserRequest::class);
        $this->crud->unsetValidation('password');
        $this->crud->setRequest($this->handlePasswordInput(request()));
        $this->setFields();
    }

    private function setFields()
    {
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Nombre',
                'type' => 'text',
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'text',
            ],
            [
                'name' => 'password',
                'label' => 'Contraseña',
                'type' => 'password',
            ],
            [
                'name' => 'security_code',
                'label' => 'Codigo de seguridad',
                'type' => 'password',
            ],
            [
                'name' => 'user_age',
                'label' => 'Edad',
                'type' => 'number',
                'default' => 14,
            ],
            [
                'name' => 'coins_gold',
                'label' => 'Creditos de oro',
                'type' => 'number',
                'default' => 0,
            ],
            [
                'name' => 'coins_silver',
                'label' => 'Creditos de plata',
                'type' => 'number',
                'default' => 0,
            ],
            [
                'name' => 'vip',
                'label' => 'VIP',
                'type' => 'datetime',
            ],
            [
                'name' => 'register_ip',
                'label' => 'IP de registro',
                'type' => 'text',
            ],
            [
                'name' => 'current_ip',
                'label' => 'IP actual',
                'type' => 'text',
            ],
            [
                'name' => 'last_connection_date',
                'label' => 'Ultima conexion',
                'type' => 'datetime',
            ],
            [
                'name' => 'admin',
                'type' => 'checkbox',
                'label' => 'Administrador',
            ],
            [
                'name' => 'active',
                'type' => 'checkbox',
                'label' => 'Activo',
            ],
        ]);
    }

    protected function handlePasswordInput($request)
    {
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        return $request;
    }

    protected function store()
    {
        $responde = $this->traitStore();
        (new CreateDataUserTask($this->crud->entry))->run();
        return $responde;
    }
}
