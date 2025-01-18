<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
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
     * @return Collection
     */
    public function getCart(): Collection
    {
        return Cart::with('product')->where('user_id', auth()->id())->get();
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function cartItem($productId): mixed
    {
        return Cart::where('product_id', $productId)->where('user_id', auth()->id())->first();
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function deleteProductFromCart($productId): mixed
    {
        return Cart::where('product_id', $productId)->where('user_id', auth()->id())->delete();
    }
}
