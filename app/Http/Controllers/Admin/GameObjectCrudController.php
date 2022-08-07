<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GameObjectRequest;
use App\Services\Parametric\ObjectRarityService;
use App\Services\Parametric\ObjectInteractionService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Controllers\Admin\Traits\GameObjectCrud\GameObjectCrudListOperationTrait;
use App\Http\Controllers\Admin\Traits\GameObjectCrud\GameObjectCrudExtraFieldsTabTrait;
use App\Http\Controllers\Admin\Traits\GameObjectCrud\GameObjectCrudInformationFieldsTabTrait;

class GameObjectCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use GameObjectCrudListOperationTrait;
    use GameObjectCrudInformationFieldsTabTrait;
    use GameObjectCrudExtraFieldsTabTrait;

    public function setup()
    {
        CRUD::setModel(\App\Models\GameObject::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/game-object');
        CRUD::setEntityNameStrings('objeto', 'objetos catalago');
        $this->objectRarityService = new ObjectRarityService();
        $this->objectInteractionService = new ObjectInteractionService();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(GameObjectRequest::class);
        $this->setInformationFieldsTab();
        $this->setExtraInformationFieldsTab();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
