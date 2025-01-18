<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\ProductService;

class CartController extends Controller
{
    protected CartService $_cartService;
    protected ProductService $_productService;

    public function __construct(CartService $_cartService, ProductService $_productService)
    {
        $this->_cartService = $_cartService;
        $this->_productService = $_productService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $cart = $this->_cartService->getCart();

        return view('cart.index', compact('cart'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function add(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = $this->_productService->getProductById($request->product_id);

        $cartItem = $this->_cartService->cartItem($product->id);

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            $this->_cartService->createCart($product->id, $request->quantity);
        }

        return redirect()->back()->with('success', __('cart.prod_add_cart'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|exists:carts,product_id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->_cartService->cartItem($request->product_id);

        if ($cart) {
            $cart->quantity = $request->quantity;
            $cart->save();
        }

        return redirect()->route('cart.index')->with('success', __('cart.cart_updated'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|exists:carts,product_id',
        ]);

        $this->_cartService->deleteProductFromCart($request->product_id);

        return redirect()->route('cart.index')->with('success', __('cart.cart_item_removed'));
    }
}
