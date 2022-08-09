<?php

namespace App\Models;

use Intervention\Image\Facades\Image;
use App\Models\Parametric\ItemCapture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Parametric\ItemAppearance;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;

class Item extends Model
{
    use CrudTrait;
    //use HasTranslations;

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

    protected $translatable = [
        'catch_message'
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

    public function setImageAttribute($value)
    {
        $attribute_name = 'image';
        $disk = config('backpack.base.root_disk_name');
        $destination_path = 'public/images/scenery/items/';
        $destination_path_db = 'images/scenery/items/';

        if (!$this->preventAttrSet) {
            if ($value == null) {
                Storage::disk($disk)->delete('public/' . $this->{$attribute_name});
                $this->attributes[$attribute_name] = null;
            }
            if (starts_with($value, 'data:image')) {
                if ($this->{$attribute_name}) {

                    Storage::disk($disk)->delete('public/' . $this->{$attribute_name});
                }
                $image = Image::make($value)->encode('jpg', 90);
                $filename = md5($value . time()) . '-' . $attribute_name . '.jpg';
                Storage::disk($disk)->put($destination_path . $filename, $image->stream());

                $this->attributes[$attribute_name] = $destination_path_db . $filename;
            }
        } else {
            $this->attributes[$attribute_name] = $value;
        }
    }
}
