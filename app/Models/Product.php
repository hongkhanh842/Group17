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

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function scopeSearch($query)
    {
        if (request('key')){
            $key = request('key');
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }
}
