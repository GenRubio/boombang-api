<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang\LangFile;
use App\Models\Lang\Language;
use App\Models\Lang\LangSection;
use Prologue\Alerts\Facades\Alert;
use App\Models\Lang\LangTranslation;
use App\Http\Requests\LangFileRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class LangFileCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation {
        destroy as traitDestroy;
    }

    public function setup()
    {
        CRUD::setModel(\App\Models\Lang\LangFile::class);
        CRUD::setRoute(config('backpack.base.route_prefix', 'admin') . '/lang-file');
        CRUD::setEntityNameStrings(trans('translationsystem.lang_file'), trans('translationsystem.lang_files'));
    }

    protected function setupListOperation()
    {
        $this->crud->removeButton('update');
        $this->crud->setColumns(
            [
                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => trans('translationsystem.form.file_name')
                ],
                [
                    'name' => 'format_name',
                    'type' => 'text',
                    'label' => trans('translationsystem.form.format_name')
                ]
            ]
        );

        $this->setShowNumberRows();
    }

    private function setShowNumberRows()
    {
        $this->crud->setDefaultPageLength(100);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(LangFileRequest::class);

        $this->crud->addFields(
            [
                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => trans('translationsystem.form.helper')
                ],
                [
                    'name' => 'format_name',
                    'type' => 'hidden',
                ],
                [
                    'name'  => 'separator',
                    'type'  => 'custom_html',
                    'value' => '<hr>'
                ],
            ]
        );
        foreach ($this->getLanguages() as $lang) {
            $this->crud->addFields(
                [
                    [
                        'name' => 'php_lang[' . $lang->abbr . ']',
                        'type'  => 'custom_html',
                        'value' => view('admin.languages-pack.php-textarea', [
                            'lang' => $lang
                        ])->render()
                    ]
                ]
            );
        }
    }

    protected function setupUpdateOperation()
    {
        $this->crud->addFields(
            [
                [
                    'name' => 'format_name',
                    'type' => 'text',
                    'label' => trans('translationsystem.form.format_name'),
                    'attributes' => [
                        'readonly'  => 'readonly',
                    ],
                ]
            ]
        );
    }

    public function store()
    {
        $response = $this->traitStore();
        $fileId = $this->data['entry']->id;
        foreach ($this->crud->getRequest()->get('php_lang') as $lang => $content) {
            if (!empty($content)) {
                $this->registerPHPContent($lang, $content, $fileId);
            }
        }
        (new LangTranslationCrudController())->makeTransletableFile();
        return $response;
    }

    private function registerPHPContent($lang, $content, $fileId)
    {
        $section = null;
        $oldLocale = app()->getLocale();
        app()->setLocale($lang);
        foreach (preg_split("/((\r?\n)|(\r\n?))/", $content) as $line) {
            if (str_contains($line, ']')){
                $section = null;
            }
            else{
                $object = $this->formatLinePhp($line);
                if ($object && !str_contains($object[1], '[') && $section) {
                    $this->creatTranslationPrepareData($object, $fileId, $section->id);
                }
                else if ($object && !str_contains($object[1], '[') && is_null($section)) {
                    $this->creatTranslationPrepareData($object, $fileId);
                }
                else if ($object && str_contains($object[1], '[')){
                    $section = $this->firstOrCreateSection($object);
                }
            }
        }
        app()->setLocale($oldLocale);
    }

    private function creatTranslationPrepareData($object, $fileId, $langSectionId = null)
    {
        $objectKey = str_replace(" ", "", $object[0]);
        $translation = $this->getTranslationByFileId($objectKey, $fileId, $langSectionId);
        if (is_null($translation)) {
            $this->createTranslation($object, $fileId, $langSectionId);
        } else {
            $translation->update([
                'value' => substr($object[1], 1)
            ]);
        }
    }

    private function formatLinePhp($line)
    {
        $line = str_replace("'", "", $line);
        $line = rtrim($line, ", ");
        return !empty($line) ? explode("=>", $line) : null;
    }

    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');
        $langFile = $this->getGnLangFileById($id);

        if ($langFile) {
            if (count($langFile->langTranslations)) {
                return Alert::error(trans('translationsystem.errors.1'));
            }
        } else {
            return Alert::error(trans('translationsystem.errors.2'));
        }

        $this->removeLangFile($langFile->format_name);
        return $this->crud->delete($id);
    }

    private function removeLangFile($name)
    {
        $folder = resource_path('lang');
        foreach ($this->getLanguages() as $lang) {
            $path = $folder . '/' . $lang->abbr;
            if (is_dir($path)) {
                unlink($path . '/' . $name . '.php');
            }
        }
    }

    private function firstOrCreateSection($object)
    {
        $name = str_replace(" ", "", $object[0]);
        $section = LangSection::where('format_name', $name)->first();
        if ($section){
            return $section;
        }
        else{
            return LangSection::create([
                'name' => $name,
                'format_name' => $name,
            ]);
        }
    }

    private function createTranslation($object, $fileId, $langSectionId)
    {
        LangTranslation::create([
            'lang_file_id' => $fileId,
            'name' => $object[0],
            'format_name' => $object[0],
            'lang_section_id' => $langSectionId,
            'value' => substr($object[1], 1)
        ]);
    }

    private function getTranslationByFileId($name, $fileId, $langSectionId)
    {
        return LangTranslation::where('format_name', $name)
            ->where('lang_file_id', $fileId)
            ->where('lang_section_id', $langSectionId)
            ->first();
    }

    private function getGnLangFileById($id)
    {
        return LangFile::find($id);
    }

    private function getLanguages()
    {
        return Language::where('active', 1)->orderBy('default', 'DESC')->get();
    }
}
