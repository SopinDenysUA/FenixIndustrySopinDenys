<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected ProductService $_productService;

    public function __construct(ProductService $_productService)
    {
        $this->_productService = $_productService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $products = $this->_productService->getAllProducts();

        return view('products.index', compact('products'));
    }
}
