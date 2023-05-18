<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class OptionController extends Controller
{
        public function index() {
            $options = Category::all();
        return view('welcome', compact('options', $options));
    }
}
