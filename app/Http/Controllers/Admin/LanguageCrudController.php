<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang\Language;
use App\Http\Requests\LanguageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class LanguageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation {
        destroy as traitDestroy;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel(\App\Models\Lang\Language::class);
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin') . '/language');
        $this->crud->setEntityNameStrings(trans('translationsystem.laguage'), trans('translationsystem.languages'));
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => trans('translationsystem.form.laguage_name'),
            ],
            [
                'name' => 'active',
                'label' => trans('translationsystem.form.language_active'),
                'type' => 'boolean',
            ],
            [
                'name' => 'default',
                'label' => trans('translationsystem.form.laguage_default'),
                'type' => 'boolean',
            ],
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(LanguageRequest::class);
        $this->crud->addField([
            'name' => 'name',
            'label' => trans('translationsystem.form.laguage_name'),
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'native',
            'label' => trans('translationsystem.form.laguage_native_name'),
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'abbr',
            'label' => trans('translationsystem.form.laguage_abbr'),
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'flag',
            'label' => trans('translationsystem.form.laguage_flag'),
            'type' => 'browse',
        ]);
        $this->crud->addField([
            'name' => 'active',
            'label' => trans('translationsystem.form.language_active'),
            'type' => 'checkbox',
        ]);
        $this->crud->addField([
            'name' => 'default',
            'label' => trans('translationsystem.form.laguage_default'),
            'type' => 'checkbox',
        ]);
    }

    public function setupUpdateOperation()
    {
        return $this->setupCreateOperation();
    }

    public function store()
    {
        $defaultLang = Language::where('default', 1)->first();
        if ($defaultLang) {
            // Copy the default language folder to the new language folder
            \File::copyDirectory(resource_path('lang/' . $defaultLang->abbr), resource_path('lang/' . request()->input('abbr')));
        }
        if (request()->input('default') === true) {
            $this->updateDefaultLaguage();
            $this->updateConfigAppFile(request()->input('abbr'));
        }
        return $this->traitStore();
    }

    public function update()
    {
        if ($this->crud->getRequest()->default){
            $this->updateDefaultLaguage();
            $this->updateConfigAppFile($this->crud->getRequest()->abbr);
        }
        return $this->traitUpdate();
    }

    private function updateDefaultLaguage()
    {
        Language::where('default', 1)->update([
            'default' => 0
        ]);
    }

    private function updateConfigAppFile($lang)
    {
        $folder = base_path('config');
        $filePhpPath = $folder . '/app.php';
        $fileTmpPath = $folder . '/app.tmp';
        $lineFind = "'locale' =>";
        $replaceLine = "'locale' => '" . $lang . "',\n";

        $this->updatePhpFile($filePhpPath, $fileTmpPath, $lineFind, $replaceLine);
    }

    private function updatePhpFile($filePhpPath, $fileTmpPath, $lineFind, $replaceLine)
    {
        $reading = fopen($filePhpPath, 'r');
        $writing = fopen($fileTmpPath, 'w');

        $replaced = false;

        while (!feof($reading)) {
            $line = fgets($reading);
            if (stristr($line, $lineFind)) {
                $line = $replaceLine;
                $replaced = true;
            }
            fputs($writing, $line);
        }
        fclose($reading);
        fclose($writing);
        if ($replaced) {
            rename($fileTmpPath, $filePhpPath);
        } else {
            unlink($fileTmpPath);
        }
    }

    /**
     * After delete remove also the language folder.
     *
     * @param int $id
     *
     * @return string
     */
    public function destroy($id)
    {
        return $this->traitDestroy($id);
    }
}
