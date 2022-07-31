<?php

namespace App\Models;

use App\Models\Parametric\MenuCategory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\Parametric\SceneryFloorIndicator;

class PublicScenery extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'public_sceneries';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'param_menu_category_id',
        'parent_id',
        'scenery_id',
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
        return $this->belongsTo(MenuCategory::class, 'param_menu_category_id');
    }

    public function indicators()
    {
        return $this->belongsToMany(SceneryFloorIndicator::class, 'scenery_indicators', 'public_scenery_id', 'param_scenery_floor_indicator_id')
            ->withPivot(
                'next_scenery_id',
                'indicator_position_x',
                'indicator_position_y',
                'next_scenery_position_x',
                'next_scenery_position_y',
                'next_scenery_position_z',
            );
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
