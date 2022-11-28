<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    #many to one
    public function category()
    {
        return  $this->belongsTo(Category::class);
    }

    public function comment()
    {
        return  $this->hasMany(Comment::class);
    }

    public function shopcart()
    {
        return $this->hasMany(ShopCart::class);
    }

    public function orderproduct()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function scopeSearch($query)
    {
        if (request('key')){
            $key = request('key');
            $query = $query->where('title', 'like', '%'.$key.'%');
        }
        return $query;
    }
}
