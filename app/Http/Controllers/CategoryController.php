<?php

namespace App\Http\Controllers;

use Validator;
use Session;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('category.index')->with('categories', $categories);
    }

    public function create() {
        return view('category.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20'
        ]);

        if ($validator->fails()) {
            return redirect('category/create')->withInput()->withErrors($validator);
        }

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('category_alert', 'New category is created');
        return redirect('category');
    }

    public function edit($id) {
        $category = Category::findorfail($id);
        return view('category.edit')->with('category', $category);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20'
        ]);

        if ($validator->fails()) {
            return redirect('category/'. $id .'/edit')->withInput()->withErrors($validator);
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        Session::flash('category_alert', 'Category has been update');
        return redirect('category');
    }

    public function destroy($id) {
        $category = Category::find($id);
        $category->delete();

        Session::flash('category_alert', 'Category has beed delete');
        return redirect('category');
    }
}
