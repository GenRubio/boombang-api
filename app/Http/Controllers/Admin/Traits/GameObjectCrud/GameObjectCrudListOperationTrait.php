<?php

namespace App\Http\Controllers\Admin\Traits\GameObjectCrud;

use App\Models\Parametric\ObjectRarity;
use App\Models\Parametric\ObjectInteraction;

trait GameObjectCrudListOperationTrait
{
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
            'name' => 'param_object_rarity_id',
            'label' => 'Tipo rareza',
            'type' => 'relationship',
            'attribute' => 'name',
            'entity'    => 'rarity',
            'model' => ObjectRarity::class,
        ]);
        $this->crud->addColumn([
            'name' => 'param_object_interaction_id',
            'label' => 'Tipo interaccion',
            'type' => 'relationship',
            'attribute' => 'name',
            'entity'    => 'interaction',
            'model' => ObjectInteraction::class,
        ]);
        $this->crud->addColumn([
            'name' => 'active',
            'type' => 'btnToggle',
            'label' => 'Activo',
        ]);

        $this->setFilters();
    }

    private function setFilters()
    {
        $this->crud->addFilter([
            'name' => 'param_object_rarity_id',
            'type' => 'select2',
            'label' => 'Tipo rareza',
        ], function () {
            $data = [];
            foreach ($this->objectRarityService->getAll() as $rarity) {
                $data[$rarity->id] = $rarity->name;
            }
            return $data;
        }, function ($value) {
            $this->crud->addClause('where', 'param_object_rarity_id', $value);
        });

        $this->crud->addFilter([
            'name' => 'param_object_interaction_id',
            'type' => 'select2',
            'label' => 'Tipo interaccion',
        ], function () {
            $data = [];
            foreach ($this->objectInteractionService->getAll() as $interaction) {
                $data[$interaction->id] = $interaction->name;
            }
            return $data;
        }, function ($value) {
            $this->crud->addClause('where', 'param_object_interaction_id', $value);
        });
    }
}
