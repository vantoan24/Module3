<?php
namespace App\Repositories\ProductImpl;

use App\Models\Product;
use App\Repositories\ProductRepositoryImpl;
use App\Repositories\Eloquent\EloquentRepository;

class ProductRepository extends EloquentRepository implements ProductRepositoryImpl
{

    public function getModel()
    {
        return Product::class;
    }
}
