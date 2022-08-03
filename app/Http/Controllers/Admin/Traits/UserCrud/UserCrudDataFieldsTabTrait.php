<?php

namespace App\Http\Controllers\Admin\Traits\UserCrud;

trait UserCrudDataFieldsTabTrait
{
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
}
