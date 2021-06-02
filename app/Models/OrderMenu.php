<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMenu extends Model
{
    use HasFactory;

    protected $table = 'orders_menus';

    protected $fillable = ['order_id', 'menu_id', 'quantity'];
}
