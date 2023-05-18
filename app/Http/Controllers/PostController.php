<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class PostController extends Controller
{
    public function index() {
        return view('index');
    }



    public function store(Request $request)
    {
       
        $favoriteColors = $request->input('title');
        
        
        //  $favoriteColors = implode(',', $favoriteColors);        
        // Category::create([
        //     'title' => $favoriteColors
        // ]);

            foreach ($favoriteColors as $color) {
            $category = new Category;
            $category->title = $color;
            $category->save();
        }

        return response()->json(['success' => true]);
    }
}
