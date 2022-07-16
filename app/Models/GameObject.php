<?php

namespace App\Models;

use App\Models\Parametric\ObjectInteraction;
use App\Models\Parametric\ObjectRarity;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class GameObject extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'game_objects';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'object_rarity_id',
        'object_interaction_id',
        'name',
        'description',
        'image',
        'file_name',
        'file_path',
        'colors_hex',
        'colors_rgb',
        'size_big',
        'size_medium',
        'size_small',
        'bit_map_size_big',
        'bit_map_size_medium',
        'bit_map_size_small',
        'walk_over_size_big',
        'walk_over_size_medium',
        'walk_over_size_small',
        'undefined_14',
        'undefined_16',
        'undefined_17',
    ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function objectRaritie()
    {
        return $this->belongsTo(ObjectRarity::class, 'object_rarity_id');
    }

    public function objectInteraction()
    {
        return $this->belongsTo(ObjectInteraction::class, 'object_interaction_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
