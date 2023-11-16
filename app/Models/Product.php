<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'discount', 'image', 'cate_id', 'descreption'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(ProductComment::class, 'product_id', 'id');
    }

    public function orderDetails()
    {
        return $this->hasMany(Order::class, 'id', 'product_id');
    }
}
