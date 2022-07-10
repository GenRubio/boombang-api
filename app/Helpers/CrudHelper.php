<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class CrudHelper
{
    public static function toggleField(Request $request)
    {
        $model = new $request->model;
        $field = $request->field;
        $obj = $model->find($request->id);
        $obj->$field = ($obj->$field) ? 0 : 1;
        $obj->save();

        $fa = ($obj->$field) ? 'la-check' : 'la-times';
        $text = ($obj->$field) ? trans('backpack::crud.yes') : trans('backpack::crud.no');

        return '<i class="la ' . $fa . '"></i> ' . $text;
    }
}
