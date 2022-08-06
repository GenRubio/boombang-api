<?php

namespace App\Http\Controllers\Admin\Traits\PublicScenery;

use App\Models\Item;

trait PublicSceneryCrudItemsFieldsTabTrait
{
    private function setItemsFieldsTab()
    {
        $this->crud->addFields([
            [
                'label'     => "Items",
                'type'      => 'select2_multiple',
                'name'      => 'items',
                'entity'    => 'items',
                'model'     =>  Item::class,
                'attribute' => 'name',
                'options'   => (function ($query) {
                    return $query->notThrowInAllPublicSceneries()->get();
                }),
                'tab' => 'Extra Items'
            ],
        ]);
    }
}
