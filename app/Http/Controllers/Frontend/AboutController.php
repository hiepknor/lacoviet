<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AboutController extends Controller
{
    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function index() {
        return view('frontend.about', [
            'categories' => $this->category->get(),
        ]);
    }
}
