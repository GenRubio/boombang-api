<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Tasks\CreateDataUserTask;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\Parametric\AvatarService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation{
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
        $this->avatarService = new AvatarService();
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
        $this->setUserFieldsTab();
    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(UserRequest::class);
        $this->crud->unsetValidation('password');
        $this->crud->setRequest($this->handlePasswordInput(request()));
        $this->setUserFieldsTab();
        $this->setDataFieldsTab();
    }

    protected function store()
    {
        $responde = $this->traitStore();
        (new CreateDataUserTask($this->crud->entry))->run();
        return $responde;
    }

    protected function update()
    {
        try {
            DB::beginTransaction();
            $currentEntry = $this->crud->getCurrentEntry();
            $dataUser = json_decode($this->crud->getRequest()->get('user_data'));
            $currentEntry->dataUser()->update((array)$dataUser[0]);
            DB::commit();
            return $this->traitUpdate();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => "Ha ocurrido un error inesperado"]);
        }
    }

    private function setDataFieldsTab()
    {
        $avatars = [];
        foreach ($this->avatarService->getAll() as $avatar) {
            $avatars[$avatar->id] = $avatar->name;
        }
        $jsonUserData = json_encode([$this->crud->getCurrentEntry()->dataUser]);
        $this->crud->addFields([
            [
                'name'  => 'user_data',
                'label' => 'Datos personaje',
                'type'  => 'repeatable',
                'value' => $jsonUserData,
                'fields' => [
                    [
                        'name' => 'avatar_id',
                        'label' => "Avatar",
                        'type' => 'select2_from_array',
                        'options' => $avatars,
                        'allows_null' => false,
                    ],
                    [
                        'name' => 'avatar_colors_hex',
                        'label' => 'Colores de avatar',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'description',
                        'label' => 'Descripcion',
                        'type' => 'textarea',
                    ],
                    [
                        'name' => 'kisses_sent',
                        'label' => 'Besos enviados',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'kisses_received',
                        'label' => 'Besos recibidos',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'juices_sent',
                        'label' => 'Cocteles enviados',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'juices_received',
                        'label' => 'Cocteles recibidos',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'flowers_sent',
                        'label' => 'Flores enviadas',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'flores_recibidas',
                        'label' => 'Flores recibidas',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'uppers_sent',
                        'label' => 'Uppers enviados',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'uppers_received',
                        'label' => 'Uppers recibidos',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'coconuts_sent',
                        'label' => 'Cocos enviados',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'coconuts_received',
                        'label' => 'Cocos recibidos',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'hobby_1',
                        'label' => 'Hobby 1',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'hobby_2',
                        'label' => 'Hobby 2',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'hobby_3',
                        'label' => 'Hobby 3',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'wish_1',
                        'label' => 'Deseo 1',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'wish_2',
                        'label' => 'Deseo 2',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'wish_3',
                        'label' => 'Deseo 3',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'votes_legal',
                        'label' => 'Votos legal',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'votes_sexy',
                        'label' => 'Votos guapo',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'votes_nice',
                        'label' => 'Votos responsable',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'points_ring',
                        'label' => 'Puntos ring',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'points_crazy_coconuts',
                        'label' => 'Puntos cocos locos',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'points_hidden_path',
                        'label' => 'Puntos sendero oculto',
                        'type' => 'number',
                    ],
                    [
                        'name' => 'points_ninja_way',
                        'label' => 'Puntos camino ninja',
                        'type' => 'number',
                    ],
                ],
                'init_rows' => 1,
                'min_rows' => 1,
                'max_rows' => 1,
                'tab' => 'Datos personaje'
            ],
        ]);
    }

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

    protected function handlePasswordInput($request)
    {
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        return $request;
    }
}
