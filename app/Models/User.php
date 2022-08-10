<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'default_locale',
        'security_code',
        'user_age',
        'coins_gold',
        'coins_silver',
        'vip',
        'admin',
        'register_ip',
        'current_ip',
        'last_connection_date',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    public function dataUser()
    {
        return $this->hasOne(DataUser::class, 'user_id', 'id');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'user_friends', 'user_id', 'friend_id')
            ->withPivot(
                'param_friend_icon_id',
                'note',
                'request_accepted',
            );
    }

    public function friendsMessages()
    {
        return $this->belongsToMany(User::class, 'user_friend_messages', 'user_id', 'friend_id')
            ->withPivot(
                'message',
                'read',
            );
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

    public function getNotReadMessagesAttribute()
    {
        return $this->friendsMessages->where('read', false);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
