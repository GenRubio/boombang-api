<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang\LangSection;
use Prologue\Alerts\Facades\Alert;
use App\Http\Requests\LangSectionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class LangSectionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation {
        destroy as traitDestroy;
    }

    public function setup()
    {
        CRUD::setModel(\App\Models\Lang\LangSection::class);
        CRUD::setRoute(config('backpack.base.route_prefix', 'admin') . '/lang-section');
        CRUD::setEntityNameStrings(trans('translationsystem.lang_section'), trans('translationsystem.lang_sections'));
    }

    protected function setupListOperation()
    {
        $this->crud->removeButton('update');
        $this->crud->setColumns(
            [
                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => trans('translationsystem.form.section_name')
                ],
                [
                    'name' => 'format_name',
                    'type' => 'text',
                    'label' => trans('translationsystem.form.format_section')
                ]
            ]
        );

        $this->setShowNumberRows();
    }

    private function setShowNumberRows(){
        $this->crud->setDefaultPageLength(100);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(LangSectionRequest::class);

        $this->crud->addFields(
            [
                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => trans('translationsystem.form.section_name_subtitle')
                ],
                [
                    'name' => 'format_name',
                    'type' => 'hidden',
                ]
            ]
        );
    }

    protected function setupUpdateOperation()
    {
        $this->crud->addFields(
            [
                [
                    'name' => 'format_name',
                    'type' => 'text',
                    'label' => trans('translationsystem.form.format_section'),
                    'attributes' => [
                        'readonly'  => 'readonly',
                    ]
                ]
            ]
        );
    }

    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');
        $section = $this->getGnSectionById($id);

        if ($section) {
            if (count($section->langTranslations)) {
                return Alert::error(trans('translationsystem.errors.3'));
            }
        } else {
            return Alert::error(trans('translationsystem.errors.2'));
        }

        return $this->crud->delete($id);
    }

    private function getGnSectionById($id)
    {
        return LangSection::find($id);
    }
}
