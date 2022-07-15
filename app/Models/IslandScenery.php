<?php

namespace App\Models;

use App\Models\Scenery;
use App\Models\Parametric\IslandType;
use App\Models\Parametric\MenuCategory;
use App\Models\Parametric\SceneryModel;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class IslandScenery extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'island_sceneries';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'scenery_id',
        'island_type_id',
        'menu_category_id',
        'scenery_model_id',
        'position_x',
        'position_y',
        'max_visitors',
        'price_uppercut',
        'price_coconut',
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

    public function scenery()
    {
        return $this->belongsTo(Scenery::class, 'scenery_id');
    }

    public function islandType()
    {
        return $this->belongsTo(IslandType::class, 'island_type_id');
    }

    public function menuCategory()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }

    public function sceneryModel()
    {
        return $this->belongsTo(SceneryModel::class, 'scenery_model_id');
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
