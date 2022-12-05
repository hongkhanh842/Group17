<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function scopeSearch($query)
    {
        if (request('key')){
            $key = request('key');
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }

   /* public function average($query)
    {
        $average = $query->comment->average('rate');
        return
    }*/
}
