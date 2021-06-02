<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desc', 'started_at', 'upcoming_event'];
    public $path = "/storage/";

    // Accessor; returning something
    public function getEventImageAttribute($value){
        return asset($value);
        // return $this->path . $value;
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function menus(){
        return $this->hasMany('App\Models\Menu');
    }
}
