<?php

namespace App\Models;

use App\Models\Parametric\ObjectRarity;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parametric\ObjectInteraction;
use App\Models\Parametric\SceneryObjectType;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\Parametric\SceneryObjectPosition;

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

    public function sceneryObjectPositions()
    {
        return $this->belongsToMany(SceneryObjectPosition::class, 'game_objects_positions', 'game_object_id', 'param_scenery_object_position_id');
    }

    public function sceneryObjectTypes()
    {
        return $this->belongsToMany(SceneryObjectType::class, 'game_objects_types', 'game_object_id', 'param_scenery_object_type_id');
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
