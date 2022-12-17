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

    public function scopeSearch($query)
    {
        if (request('name')){
            $key = request('name');
            $query->where(function ($q) use ($key) {
                foreach ($key as $each) {
                    $q->orWhere('name', 'like', '%'.$each.'%');
                }
                $query = $q;
            });
        }

        if (request('ram')){
            $key = request('ram');
            $query->where(function ($q) use ($key) {
                foreach ($key as $each) {
                    $q->orWhere('ram',$each);
            }
            $query = $q;
            });
        }

        if (request('ssd')){
            $key = request('ssd');
            $query->where(function ($q) use ($key) {
                foreach ($key as $each) {
                    $q->orWhere('ssd', $each);
                }
                $query = $q;
            });
        }

        if (request('brand')){
            $key = request('brand');
            $query->where(function ($q) use ($key) {
                foreach ($key as $each) {
                    $q->orWhere('name', 'like', '%'.getBrandeByKey($each).'%');
                }
                $query = $q;
            });
        }

        if (request('cpu')){
            $key = request('cpu');
            $query->where(function ($q) use ($key) {
                foreach ($key as $each) {
                    $q->orWhere('cpu', $each);
                }
                $query = $q;
            });
        }

        if (request('use')){
            $key = request('use');
            $query->where(function ($q) use ($key) {
                foreach ($key as $each) {
                    $q->orWhere('use', $each);
                }
                $query = $q;
            });
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

        if (request('cate')){
            $key = request('cate');
            $query = $query->where('category_id',$key)->latest();
        }

        return $query;
    }
}
