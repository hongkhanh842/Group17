<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
        'address',
        /*'role',*/
    ];

    public function reviews()
    {
        return $this->hasMany(Comment::class);
    }

    public function shopcart()
    {
        return $this->hasMany(ShopCart::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
