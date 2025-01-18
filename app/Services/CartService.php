<?php

namespace App\Services;

use App\Models\Cart;

class CartService
{
    /**
     * @param $productId
     * @param $quantity
     * @return mixed
     */
    public function createCart($productId, $quantity): mixed
    {
        return Cart::create([
            'product_id' => $productId,
            'user_id' => auth()->id(),
            'quantity' => $quantity,
        ]);
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function cartItem($productId): mixed
    {
        return Cart::where('product_id', $productId)->where('user_id', auth()->id())->first();
    }
}
