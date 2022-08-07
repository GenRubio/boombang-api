<?php

namespace App\Http\Controllers\Admin\Traits\GameObjectCrud;

use App\Models\Parametric\ObjectRarity;
use App\Models\Parametric\ObjectInteraction;

trait GameObjectCrudInformationFieldsTabTrait
{
    private function setInformationFieldsTab()
    {
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Nombre',
                'type' => 'text',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'description',
                'label' => 'Descripcion',
                'type' => 'textarea',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'image',
                'label' => 'Imagen',
                'type' => 'image',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'colors_hex',
                'label' => 'Colores HEX',
                'type' => 'text',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'colors_rgb',
                'label' => 'Colores RGB',
                'type' => 'text',
                'tab' => 'Informacion'
            ],
            [
                'label'     => "Tipo rareza",
                'type'      => 'select2',
                'name'      => 'param_object_rarity_id',
                'entity'    => 'rarity',
                'model'     => ObjectRarity::class,
                'attribute' => 'name',
                'tab' => 'Informacion'
            ],
            [
                'label'     => "Tipo interaccion",
                'type'      => 'select2',
                'name'      => 'param_object_interaction_id',
                'entity'    => 'interaction',
                'model'     => ObjectInteraction::class,
                'attribute' => 'name',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'size_big',
                'label' => 'Medida grande',
                'type' => 'text',
                'default' => '0',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'size_medium',
                'label' => 'Medida mediana',
                'type' => 'text',
                'default' => '1',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'size_small',
                'label' => 'Medida pequeña',
                'type' => 'text',
                'default' => '0',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'bit_map_size_big',
                'label' => 'Mapa Bits - medida grande (espacio ocupado en escenario)',
                'type' => 'text',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'bit_map_size_medium',
                'label' => 'Mapa Bits - medida mediana (espacio ocupado en escenario)',
                'type' => 'text',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'bit_map_size_small',
                'label' => 'Mapa Bits - medida pequeña (espacio ocupado en escenario)',
                'type' => 'text',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'walk_over_size_big',
                'label' => 'Caminar encima - medida grande',
                'type' => 'text',
                'default' => '0',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'walk_over_size_medium',
                'label' => 'Caminar encima - medida mediana',
                'type' => 'text',
                'default' => '0',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'walk_over_size_small',
                'label' => 'Caminar encima - medida pequeña',
                'type' => 'text',
                'default' => '0',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'undefined_14',
                'label' => 'Undefined 14',
                'type' => 'text',
                'default' => '-1',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'undefined_16',
                'label' => 'Undefined 16',
                'type' => 'text',
                'default' => '1',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'undefined_17',
                'label' => 'Undefined 17',
                'type' => 'text',
                'default' => '1',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'file_name',
                'label' => 'Nombre archivo',
                'type' => 'text',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'file_path',
                'label' => 'Ruta archivo',
                'type' => 'text',
                'tab' => 'Informacion'
            ],
            [
                'name' => 'active',
                'type' => 'checkbox',
                'label' => 'Activo',
                'default' => true,
                'tab' => 'Informacion'
            ],
        ]);
    }
}
