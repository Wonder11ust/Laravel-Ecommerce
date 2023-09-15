<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
   // protected $with = ['carts','orderItem'];
    use HasFactory;

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
