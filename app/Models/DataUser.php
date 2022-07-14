<?php

namespace App\Models;

use App\Models\Parametric\Avatar;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class DataUser extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'data_users';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'avatar_id',
        'avatar_colors_hex',
        'description',
        'kisses_sent',
        'kisses_received',
        'juices_sent',
        'juices_received',
        'flowers_sent',
        'flores_recibidas',
        'uppers_sent',
        'uppers_received',
        'coconuts_sent',
        'coconuts_received',
        'hobby_1',
        'hobby_2',
        'hobby_3',
        'wish_1',
        'wish_2',
        'wish_3',
        'votes_legal',
        'votes_sexy',
        'votes_nice',
        'points_ring',
        'points_crazy_coconuts',
        'points_hidden_path',
        'points_ninja_way',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function avatar()
    {
        return $this->belongsTo(Avatar::class, 'avatar_id');
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

    public function getAvatarParameterAttribute()
    {
        return $this->avatar->parameter;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
