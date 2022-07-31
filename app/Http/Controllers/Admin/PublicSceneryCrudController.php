<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Scenery;
use App\Enums\ParametricEnum;
use Illuminate\Support\Facades\DB;
use App\Services\PublicSceneryService;
use App\Models\Parametric\MenuCategory;
use App\Http\Requests\PublicSceneryRequest;
use App\Services\Parametric\MenuCategoryService;
use App\Services\Parametric\CharacterLookService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Services\Parametric\SceneryFloorIndicatorService;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

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
            'name' => 'menuCategory',
            'label' => 'Categoria',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => MenuCategory::class,
        ]);
        $this->crud->addColumn([
            'name' => 'scenery',
            'label' => 'Escenario',
            'type' => 'relationship',
            'attribute' => 'name',
            'model'     => Scenery::class,
        ]);
        $this->crud->addColumn([
            'name' => 'visible',
            'type' => 'btnToggle',
            'label' => 'Visible',
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
            'name' => 'param_menu_category_id',
            'type' => 'select2',
            'label' => 'Categorias',
        ], function () {
            $data = [];
            foreach ($this->menuCategoryService->getAll() as $menuCategory) {
                if (
                    $menuCategory->id == ParametricEnum::MENU_CATEGORIES['AREA']
                    || $menuCategory->id == ParametricEnum::MENU_CATEGORIES['GAME']
                ) {
                    $data[$menuCategory->id] = $menuCategory->name;
                }
            }
            return $data;
        }, function ($value) {
            $this->crud->addClause('where', 'param_menu_category_id', $value);
        });
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(PublicSceneryRequest::class);
        $this->setSceneryFieldsTab();
    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(PublicSceneryRequest::class);
        $this->setSceneryFieldsTab();
        $this->setIndicatorsFieldsTab();
    }

    protected function update()
    {
        try {
            DB::beginTransaction();
            $currentEntry = $this->crud->getCurrentEntry();
            $indicators = json_decode($this->crud->getRequest()->get('floor_indicators'));
            $syncData = [];
            foreach($indicators as $indicator){
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

    private function setIndicatorsFieldsTab()
    {
        $indicators = [];
        foreach ($this->sceneryFloorIndicatorService->getAll() as $indicator) {
            $indicators[$indicator->id] = $indicator->name;
        }
        $publicSceneries = [];
        foreach ($this->publicSceneryService->getAll() as $scenery) {
            $publicSceneries[$scenery->id] = $scenery->name;
        }
        $characterLooks = [];
        foreach ($this->characterLookService->getAll() as $look) {
            $characterLooks[$look->id] = $look->name;
        }

        $sceneryIndicators = $this->crud->getCurrentEntry()->indicators;
        $indicatorsToEdit = [];
        foreach ($sceneryIndicators as $indicator) {
            $indicatorsToEdit[] = [
                'param_scenery_floor_indicator_id' => $indicator->pivot->param_scenery_floor_indicator_id,
                'indicator_position_x' => $indicator->pivot->indicator_position_x,
                'indicator_position_y' => $indicator->pivot->indicator_position_y,
                'next_scenery_id' => $indicator->pivot->next_scenery_id,
                'next_scenery_position_x' => $indicator->pivot->next_scenery_position_x,
                'next_scenery_position_y' => $indicator->pivot->next_scenery_position_y,
                'next_scenery_position_z' => $indicator->pivot->next_scenery_position_z
            ];
        }

        $jsonIndicators = json_encode($indicatorsToEdit);
        $this->crud->addFields([
            [
                'name'  => 'floor_indicators',
                'label' => 'Indicadores',
                'type'  => 'repeatable',
                'value' => $jsonIndicators,
                'fields' => [
                    [
                        'name' => 'public_scenery_id',
                        'type' => 'hidden',
                        'value' => $this->crud->getCurrentEntry()->id
                    ],
                    [
                        'name' => 'param_scenery_floor_indicator_id',
                        'label' => "Indicador",
                        'type' => 'select2_from_array',
                        'options' => $indicators,
                        'allows_null' => false,
                        'wrapper' => ['class' => 'form-group col-md-6'],
                    ],
                    [
                        'name'    => 'indicator_position_x',
                        'type'    => 'number',
                        'label'   => 'Posicion X',
                        'default' => 11,
                        'wrapper' => ['class' => 'form-group col-md-3'],
                    ],
                    [
                        'name'    => 'indicator_position_y',
                        'type'    => 'number',
                        'label'   => 'Posicion Y',
                        'default' => 11,
                        'wrapper' => ['class' => 'form-group col-md-3'],
                    ],
                    [
                        'name'  => 'separator',
                        'type'  => 'custom_html',
                        'value' => '<hr>'
                    ],
                    [
                        'name' => 'next_scenery_id',
                        'label' => "Escenario apricion",
                        'type' => 'select2_from_array',
                        'options' => $publicSceneries,
                        'allows_null' => false,
                        'wrapper' => ['class' => 'form-group col-md-6'],
                    ],
                    [
                        'name'    => 'next_scenery_position_x',
                        'type'    => 'number',
                        'label'   => 'Posicion X',
                        'default' => 11,
                        'wrapper' => ['class' => 'form-group col-md-3'],
                    ],
                    [
                        'name'    => 'next_scenery_position_y',
                        'type'    => 'number',
                        'label'   => 'Posicion Y',
                        'default' => 11,
                        'wrapper' => ['class' => 'form-group col-md-3'],
                    ],
                    [
                        'name'    => 'next_scenery_position_z',
                        'label'   => 'Mirada personaje',
                        'type' => 'select2_from_array',
                        'options' => $characterLooks,
                        'allows_null' => false,
                        'wrapper' => ['class' => 'form-group col-md-4'],
                    ],
                ],
                'new_item_label'  => 'Añadir indicador',
                'init_rows' => 0,
                'tab' => 'Indicadores'
            ],
        ]);
    }

    private function setSceneryFieldsTab()
    {
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Nombre',
                'type' => 'text',
                'tab' => 'Escenario'
            ],
            [
                'label'     => "Escenario",
                'type'      => 'select2',
                'name'      => 'scenery_id',
                'entity'    => 'scenery',
                'model'     => Scenery::class,
                'attribute' => 'name',
                'options'   => (function ($query) {
                    return $query->where('param_scenary_type_id', ParametricEnum::SCENERY_TYPES['PUBLIC'])
                        ->get();
                }),
                'tab' => 'Escenario'
            ],
            [
                'label'     => "Categoria",
                'type'      => 'select2',
                'name'      => 'param_menu_category_id',
                'entity'    => 'menuCategory',
                'model'     => MenuCategory::class,
                'attribute' => 'name',
                'options'   => (function ($query) {
                    return $query->where('id', ParametricEnum::MENU_CATEGORIES['AREA'])
                        ->orWhere('id', ParametricEnum::MENU_CATEGORIES['GAME'])
                        ->get();
                }),
                'tab' => 'Escenario'
            ],
            [
                'name' => 'position_x',
                'label' => 'Posicion entrada X',
                'type' => 'number',
                'default' => 11,
                'tab' => 'Escenario'
            ],
            [
                'name' => 'position_y',
                'label' => 'Posicion entrada Y',
                'type' => 'number',
                'default' => 11,
                'tab' => 'Escenario'
            ],
            [
                'name' => 'max_visitors',
                'label' => 'Maximo jugadores en escenario',
                'type' => 'number',
                'default' => 12,
                'tab' => 'Escenario'
            ],
            [
                'name' => 'price_uppercut',
                'label' => 'Precio uppercut',
                'type' => 'number',
                'default' => 250,
                'tab' => 'Escenario'
            ],
            [
                'name' => 'price_coconut',
                'label' => 'Precio coco',
                'type' => 'number',
                'default' => 25,
                'tab' => 'Escenario'
            ],
            [
                'name' => 'visible',
                'type' => 'checkbox',
                'label' => 'Visible',
                'default' => true,
                'tab' => 'Escenario'
            ],
            [
                'name' => 'active',
                'type' => 'checkbox',
                'label' => 'Activo',
                'default' => true,
                'tab' => 'Escenario'
            ],
        ]);
    }

    protected function setupReorderOperation()
    {
        $this->crud->set('reorder.label', 'name');
        $this->crud->set('reorder.max_level', 0);
    }
}
