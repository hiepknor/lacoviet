<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    private $category;

    private $product;

    public function __construct
    (
        Category $category,
        Product $product
    )
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index() {
        return view('frontend.product', [
            'categories' => $this->category->get(),
            'products' => $this->product->get()
        ]);
    }

    public function detail($categorySlug, $productSlug) {
        $product = $this->product->whereSlug($productSlug)->first();
        return view('frontend.product-detail', [
            'categories' => $this->category->get(),
            'products' => $product,
        ]);
    }
}
