<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desc', 'quantity', 'price'];
    // public $path = "/storage/";

    // Accessor; returning something
    public function getMenuImageAttribute($value){
        return asset($value);
        // return $this->path . $value;

    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
