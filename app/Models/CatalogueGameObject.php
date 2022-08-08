<?php

namespace App\Models;

use App\Models\GameObject;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parametric\CatalogueCategory;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class CatalogueGameObject extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'catalogue_game_objects';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'game_object_id',
        'param_catalogue_category_id',
        'price_gold',
        'price_silver',
        'vip',
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

    public function object()
    {
        return $this->belongsTo(GameObject::class, 'game_object_id');
    }

    public function category()
    {
        return $this->belongsTo(CatalogueCategory::class, 'param_catalogue_category_id');
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

    public function scopeVip($query)
    {
        return $query->where($this->table . '.vip', true);
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
