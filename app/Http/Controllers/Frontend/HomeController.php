<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
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
        return view('frontend.home', [
            'all_categories' => $this->category->get(),
            'product' => $this->product->get(),
        ]);
    }
}
