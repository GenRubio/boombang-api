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
        'param_object_rarity_id',
        'param_object_interaction_id',
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
        'active'
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

    public function rarity()
    {
        return $this->belongsTo(ObjectRarity::class, 'param_object_rarity_id');
    }

    public function interaction()
    {
        return $this->belongsTo(ObjectInteraction::class, 'param_object_interaction_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where($this->table . '.active', true);
    }

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
