<?php

namespace App\Http\Controllers\Admin\Traits\PrivateScenery;

use App\Models\Item;

trait PrivateSceneryCrudItemsFieldsTabTrait
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
                    return $query->notThrowInAllPrivateSceneries()->get();
                }),
                'tab' => 'Extra Items'
            ],
        ]);
    }
}
