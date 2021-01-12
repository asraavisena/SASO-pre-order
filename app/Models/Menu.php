<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'menu_image', 'desc', 'quantity', 'price'];

    // Accessor; returning something
    public function getMenuImageAttribute($value){
        return asset($value);
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
