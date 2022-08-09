<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Services\PublicSceneryService;
use App\Http\Requests\PublicSceneryRequest;
use App\Services\Parametric\MenuCategoryService;
use App\Services\Parametric\CharacterLookService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Services\Parametric\SceneryFloorIndicatorService;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Controllers\Admin\Traits\PublicScenery\PublicSceneryCrudListOperationTrait;
use App\Http\Controllers\Admin\Traits\PublicScenery\PublicSceneryCrudItemsFieldsTabTrait;
use App\Http\Controllers\Admin\Traits\PublicScenery\PublicSceneryCrudSceneryFieldsTabTrait;
use App\Http\Controllers\Admin\Traits\PublicScenery\PublicSceneryCrudIndicatorsFieldsTabTrait;

class PublicSceneryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use PublicSceneryCrudListOperationTrait;
    use PublicSceneryCrudItemsFieldsTabTrait;
    use PublicSceneryCrudIndicatorsFieldsTabTrait;
    use PublicSceneryCrudSceneryFieldsTabTrait;

    public function setup()
    {
        CRUD::setModel(\App\Models\PublicScenery::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/public-scenery');
        CRUD::setEntityNameStrings('escenario', 'escenarios publicos');
        $this->menuCategoryService = new MenuCategoryService();
        $this->sceneryFloorIndicatorService = new SceneryFloorIndicatorService();
        $this->publicSceneryService = new PublicSceneryService();
        $this->characterLookService = new CharacterLookService();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(PublicSceneryRequest::class);
        $this->setSceneryFieldsTab();
        $this->setItemsFieldsTab();
    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(PublicSceneryRequest::class);
        $this->setSceneryFieldsTab();
        $this->setIndicatorsFieldsTab();
        $this->setItemsFieldsTab();
    }

    protected function update()
    {
        try {
            DB::beginTransaction();
            $currentEntry = $this->crud->getCurrentEntry();
            $indicators = json_decode($this->crud->getRequest()->get('floor_indicators'));
            $syncData = [];
            foreach ($indicators as $indicator) {
                $syncData[] = [
                    'public_scenery_id' => $indicator->public_scenery_id,
                    'param_scenery_floor_indicator_id' => $indicator->param_scenery_floor_indicator_id,
                    'indicator_position_x' => $indicator->indicator_position_x,
                    'indicator_position_y' => $indicator->indicator_position_y,
                    'next_scenery_id' => $indicator->next_scenery_id,
                    'next_scenery_position_x' => $indicator->next_scenery_position_x,
                    'next_scenery_position_y' => $indicator->next_scenery_position_y,
                    'next_scenery_position_z' => $indicator->next_scenery_position_z
                ];
            }
            $currentEntry->indicators()->sync($syncData);
            DB::commit();
            return $this->traitUpdate();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => "Ha ocurrido un error inesperado"]);
        }
    }

    protected function setupReorderOperation()
    {
        $this->crud->set('reorder.label', 'name');
        $this->crud->set('reorder.max_level', 0);
    }
}
