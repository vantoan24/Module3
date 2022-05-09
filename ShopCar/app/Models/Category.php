<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    public function productss()
    {
        return $this->hasMany(Product::class, 'product_id','id');
    }
}
