<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LangConditionTextsExport implements FromArray, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data  = $data;
    }

    public function headings(): array
    {
        $header = [];
        $header[] = 'ID';
        $header[] = 'Text';

        foreach ($this->data['laguages'] as $language) {
            $header[] = $language->name . '-' . $language->abbr;
        }

        return $header;
    }

    public function array(): array
    {
        $translations = [];
        foreach ($this->data['translations'] as $translation) {
            $prepareLang = [];
            $prepareLang['ID'] = $translation->id;
            $prepareLang['Text'] = $translation->value;
            foreach ($this->data['laguages'] as $language) {
                $oldLocale = app()->getLocale();
                app()->setLocale($language->abbr);
                $prepareLang[$language->name . '-' . $language->abbr] = $translation->value;
                app()->setLocale($oldLocale);
            }
            $translations[] = $prepareLang;
        }
        return $translations;
    }
}
