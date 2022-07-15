<?php

namespace App\Models;

use App\Models\Scenery;
use App\Models\Parametric\MenuCategory;
use App\Models\Parametric\SceneryModel;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class GameScenery extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'game_sceneries';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'parent_id',
        'scenery_id',
        'menu_category_id',
        'scenery_model_id',
        'name',
        'position_x',
        'position_y',
        'max_visitors',
        'price_uppercut',
        'price_coconut',
        'lft',
        'rgt',
        'depth',
        'visible',
        'active',
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

    public function scopeActive($query)
    {
        return $query->where($this->table . '.active', 1);
    }

    public function scopeVisible($query)
    {
        return $query->where($this->table . '.visible', 1);
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
