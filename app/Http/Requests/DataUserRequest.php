<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class DataUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar_id' => 'required',
            'avatar_colors_hex' => 'required',
            'kisses_sent' => 'required',
            'kisses_received' => 'required',
            'juices_sent' => 'required',
            'juices_received' => 'required',
            'flowers_sent' => 'required',
            'flores_recibidas' => 'required',
            'uppers_sent' => 'required',
            'uppers_received' => 'required',
            'coconuts_sent' => 'required',
            'coconuts_received' => 'required',
            'votes_legal' => 'required',
            'votes_sexy' => 'required',
            'votes_nice' => 'required',
            'points_ring' => 'required',
            'points_crazy_coconuts' => 'required',
            'points_hidden_path' => 'required',
            'points_ninja_way' => 'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
