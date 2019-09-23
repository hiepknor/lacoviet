<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class EventController extends Controller
{
    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function index() {
        return view('frontend.event', [
            'all_categories' => $this->category->get(),
        ]);
    }
}
