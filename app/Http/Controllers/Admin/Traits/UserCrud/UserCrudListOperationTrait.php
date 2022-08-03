<?php

namespace App\Http\Controllers\Admin\Traits\UserCrud;

trait UserCrudListOperationTrait
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
}
