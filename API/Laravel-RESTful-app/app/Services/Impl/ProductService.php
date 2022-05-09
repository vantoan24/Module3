<?php
namespace App\Services\Impl;

use App\Repositories\ProductRepositoryImpl;
use App\Services\ProductServicelmpl;

class ProductService extends ProductServicelmpl{
    protected $productRepository;

    public function __construct(ProductRepositoryImpl $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function findById($id)
    {
        $product = $this->productRepository->findById($id);

        $statusCode = 200;
        if (!$product) {
            $statusCode = 404;
        }

        return [
            'statusCode' => $statusCode,
            'products' => $product
        ];
    }

    public function create($request)
    {
        $product = $this->productRepository->create($request);

        $statusCode = 201;
        if (!$product) {
            $statusCode = 500;
        }

        return [
            'statusCode' => $statusCode,
            'products' => $product
        ];
    }

    public function update($request, $id)
    {
        $oldProduct = $this->productRepository->findById($id);

        if (!$oldProduct) {
            $newProduct = null;
            $statusCode = 404;
        } else {
            $newProduct = $this->productRepository->update($request, $oldProduct);
            $statusCode = 200;
        }

        return [
            'statusCode' => $statusCode,
            'products' => $newProduct
        ];
    }

    public function destroy($id)
    {
        $product = $this->productRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($product) {
            $this->productRepository->destroy($product);
            $statusCode = 200;
            $message = "Delete success!";
        }

        return [
            'statusCode' => $statusCode,
            'message' => $message
        ];
    }
}