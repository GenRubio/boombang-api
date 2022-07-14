<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Parametric\Avatar;
use App\Http\Requests\DataUserRequest;
use App\Services\UserService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class DataUserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\DataUser::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/data-user');
        CRUD::setEntityNameStrings('user data', 'users data');
        $this->userService = new UserService();
    }

    protected function setupListOperation()
    {
        $this->crud->removeButton('create');
        CRUD::removeButtons(['revise', 'delete']);

        $this->crud->addColumn([
            'name' => 'user',
            'label' => 'Usuario',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => User::class,
        ]);
        $this->crud->addColumn([
            'name' => 'avatar',
            'label' => 'Avatar',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => Avatar::class,
        ]);
        $this->crud->addColumn([
            'name' => 'description',
            'label' => 'Descripcion',
            'type'  => 'text',
        ]);

        $this->setFilters();
    }

    private function setFilters()
    {
        $this->crud->addFilter([
            'name' => 'user_id',
            'type' => 'select2',
            'label' => 'Usuarios',
        ], function () {
            $data = [];
            foreach ($this->userService->getAllActive() as $user) {
                $data[$user->id] = $user->name;
            }
            return $data;
        }, function ($value) {
            $this->crud->addClause('where', 'user_id', $value);
        });
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(DataUserRequest::class);

        $this->crud->addFields([
            [
                'label'     => "Usuario",
                'type'      => 'select2',
                'name'      => 'user_id',
                'entity'    => 'user',
                'model'     => User::class,
                'attribute' => 'name',
                'attributes' => [
                    'readonly'    => 'readonly',
                    'disabled'    => 'disabled',
                ],
            ],
            [
                'label'     => "Avatar",
                'type'      => 'select2',
                'name'      => 'avatar_id',
                'entity'    => 'avatar',
                'model'     => Avatar::class,
                'attribute' => 'name',
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
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
