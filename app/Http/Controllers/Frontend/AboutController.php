<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function index() {
        return view('pages.about', [
            'all_categories' => $this->category->get(),
        ]);
    }
}
