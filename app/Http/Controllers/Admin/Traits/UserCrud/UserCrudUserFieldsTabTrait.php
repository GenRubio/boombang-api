<?php

namespace App\Http\Controllers\Admin\Traits\UserCrud;

trait UserCrudUserFieldsTabTrait
{
    private function setUserFieldsTab()
    {
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Nombre',
                'type' => 'text',
                'tab' => 'Usuario'
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'text',
                'tab' => 'Usuario'
            ],
            [
                'name' => 'password',
                'label' => 'Contraseña',
                'type' => 'password',
                'tab' => 'Usuario'
            ],
            [
                'name' => 'security_code',
                'label' => 'Codigo de seguridad',
                'type' => 'password',
                'tab' => 'Usuario'
            ],
            [
                'name' => 'user_age',
                'label' => 'Edad',
                'type' => 'number',
                'default' => 14,
                'tab' => 'Usuario'
            ],
            [
                'name' => 'coins_gold',
                'label' => 'Creditos de oro',
                'type' => 'number',
                'default' => 0,
                'tab' => 'Usuario'
            ],
            [
                'name' => 'coins_silver',
                'label' => 'Creditos de plata',
                'type' => 'number',
                'default' => 0,
                'tab' => 'Usuario'
            ],
            [
                'name' => 'vip',
                'label' => 'VIP',
                'type' => 'datetime',
                'tab' => 'Usuario'
            ],
            [
                'name' => 'register_ip',
                'label' => 'IP de registro',
                'type' => 'text',
                'tab' => 'Usuario'
            ],
            [
                'name' => 'current_ip',
                'label' => 'IP actual',
                'type' => 'text',
                'tab' => 'Usuario'
            ],
            [
                'name' => 'last_connection_date',
                'label' => 'Ultima conexion',
                'type' => 'datetime',
                'tab' => 'Usuario'
            ],
            [
                'name' => 'admin',
                'type' => 'checkbox',
                'label' => 'Administrador',
                'tab' => 'Usuario'
            ],
            [
                'name' => 'active',
                'type' => 'checkbox',
                'label' => 'Activo',
                'tab' => 'Usuario'
            ],
        ]);
    }
}
