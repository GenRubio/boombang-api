<?php

namespace App\Models;

use App\Models\Parametric\ItemAppearance;
use App\Models\Parametric\ItemCapture;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'items';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'param_item_appearance_id',
        'param_item_capture_id',
        'name',
        'image',
        'catch_message',
        'parameter',
        'appearance_time',
        'throw_in_public_sceneries',
        'throw_in_private_sceneries',
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

    public function itemAppearance()
    {
        return $this->belongsTo(ItemAppearance::class, 'param_item_appearance_id');
    }

    public function itemCapture()
    {
        return $this->belongsTo(ItemCapture::class, 'param_item_capture_id');
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

    public function scopeNotThrowInAllPublicSceneries($query)
    {
        return $query->where($this->table . '.throw_in_public_sceneries', false);
    }

    public function scopeNotThrowInAllPrivateSceneries($query)
    {
        return $query->where($this->table . '.throw_in_private_sceneries', false);
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
