<?php

namespace App\Models;

use App\Models\Scenery;
use App\Models\Parametric\MiniGame;
use App\Models\Parametric\MenuCategory;
use App\Models\Parametric\SceneryModel;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class MiniGameScenery extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'mini_game_sceneries';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'scenery_id',
        'mini_game_id',
        'menu_category_id',
        'scenery_model_id',
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

    public function miniGame()
    {
        return $this->belongsTo(MiniGame::class, 'mini_game_id');
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
