<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function dashboard(){
        return view('backend.dashboard');
    }

    public function settings(){
        return view('backend.settings');
    }

    public function charts() {
        return view('backend.charts');
    }
}
