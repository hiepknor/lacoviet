<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct() {
        //
    }

    public function index($categorySlug) {
        $categories = Category::get();
        $category_by_slug = Category::where('slug', $categorySlug)->first();
        $product = Product::where('category_id', $category_by_slug->id)->get();
        return view('frontend.category', compact('categories', 'category_by_slug', 'product'));
    }
}
