<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Product_img;
use Doctrine\DBAL\Types\Type;

class Product extends Model
{
    use HasFactory;

    //khai bao bang model se lam ziec
    protected $table     = 'product';

    public function danh_muc(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    public function imgs(Type $var = null)
    {
        return $this->hasMany(Product_img::class, 'product_id', 'id');
    }
    
}
