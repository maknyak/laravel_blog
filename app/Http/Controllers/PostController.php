<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('post.index');
    }

    public function create() {
        $categories = [];
        
        foreach(Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        
        return view('post.create')->with('categories', $categories);
    }
}
