<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Product_img extends Model
{
    use HasFactory;
    protected $table = 'images';

    public function product(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
