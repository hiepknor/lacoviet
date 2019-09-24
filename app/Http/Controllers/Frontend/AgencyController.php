<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AgencyController extends Controller
{
    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function index() {
        return view('frontend.agency', [
            'categories' => $this->category->get(),
        ]);
    }
}
