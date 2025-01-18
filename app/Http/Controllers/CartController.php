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
        return view('cart.index');
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
