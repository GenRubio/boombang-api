<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PrivateSceneryRequest;
use App\Services\Parametric\MenuCategoryService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Controllers\Admin\Traits\PrivateScenery\PrivateSceneryCrudListOperationTrait;
use App\Http\Controllers\Admin\Traits\PrivateScenery\PrivateSceneryCrudItemsFieldsTabTrait;
use App\Http\Controllers\Admin\Traits\PrivateScenery\PrivateSceneryCrudSceneryFieldsTabTrait;

class PrivateSceneryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use PrivateSceneryCrudListOperationTrait;
    use PrivateSceneryCrudItemsFieldsTabTrait;
    use PrivateSceneryCrudSceneryFieldsTabTrait;

    public function setup()
    {
        CRUD::setModel(\App\Models\PrivateScenery::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/private-scenery');
        CRUD::setEntityNameStrings('escenario', 'escenarios privados');
        $this->menuCategoryService = new MenuCategoryService();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(PrivateSceneryRequest::class);
        $this->setSceneryFieldsTab();
        $this->setItemsFieldsTab();
    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(PrivateSceneryRequest::class);
        $this->setSceneryFieldsTab();
        $this->setItemsFieldsTab();
    }
}
