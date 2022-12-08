<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;
   /* protected $casts = [
        'price' => 'number_format',
    ];*/

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

    public function scopeName($query)
    {
        if (request('key')){
            $key = request('key');
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }

   /* public function getPriceAttribute()
    {
        return Attribute::make(
            set: fn ($value) => number_format($value),
        );
    }*/

    public function scopeSearch($query)
    {
        if (request('name')){
            $key = request('name');
            $query = $query->where('name', 'like', '%'.$key.'%');
        }

        if (request('ram')){
            $key = request('ram');
            $query = $query->where('ram', $key);
        }

        if (request('ssd')){
            $key = request('ssd');
            $query = $query->where('ssd', $key);
        }

        if (request('cpu')){
            $key = request('cpu');
            $query = $query->where('cpu', $key);
        }

        if (request('use')){
            $key = request('use');
            $query = $query->where('use', $key);
        }

        if (request('sort')){
            $key = request('sort');
            if ($key === "up")
            {
                $query = $query->orderBy('price');
            }
            else   $query = $query->orderBy('price', 'DESC');
        }
        if (request('new')){
            $key = request('new');
            $query = $query->latest();
        }

        return $query;
    }
}
