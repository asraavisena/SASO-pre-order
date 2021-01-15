<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'event_image', 'desc', 'started_at'];
    public $path = "/storage/";

    // Accessor; returning something
    public function getEventImageAttribute($value){
        // return asset($value);
        return $this->path . $value;
    }
}
