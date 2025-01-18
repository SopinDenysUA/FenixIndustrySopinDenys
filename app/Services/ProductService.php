<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    /**
     * @return Collection
     */
    public function getAllProducts(): Collection
    {
        return Product::all();
    }

    /**
     * @param $product_id
     * @return mixed
     */
    public function getProductById($product_id): mixed
    {
        return Product::findOrFail($product_id);
    }
}
