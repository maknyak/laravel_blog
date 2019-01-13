<?php

namespace App\Http\Controllers;

use Session;
use Validator;
use File;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('admin.post.index')->with('posts', $posts);
    }

    public function create() {
        $categories = [];
        
        foreach(Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        
        return view('admin.post.create')->with('categories', $categories);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer',
            'title' => 'required|min:3|max:20',
            'author' => 'required|min:3|max:20',
            'short_description' => 'required|min:10|max:50',
            'description' => 'required|min:50|max:1000',
            'image' => 'required|mimes:jpeg,jpeg,png'
        ]);

        if ($validator->fails()) {
            return redirect('admin/post/create')->withInput()->withErrors($validator);
        }

        
        $image = $request->file('image');
        $upload = 'img/posts/';
        $filename = $image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathName(), $upload . $filename);


        $post = new Post;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->image = $filename;
        $post->save();

        Session::flash('post_alert', 'Post has been saved.');
        return redirect('admin/post');
    }

    public function edit($id) {
        $post = Post::findorfail($id);

        $categories = [];
        foreach(Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }

        return view('admin.post.edit')->with(['post' => $post, 'categories' => $categories]);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer',
            'title' => 'required|min:3|max:20',
            'author' => 'required|min:3|max:20',
            'short_description' => 'required|min:3|max:50',
            'description' => 'required|min:50|max:1000',
            'image' => 'mimes:jpg, jpeg, png'
        ]);

        if ($validator->fails()) {
            return redirect('admin/post/'. $id .'/edit')->withInput()->withErrors($validator);
        }

        if ($request->file('image') != '') {
            $image = $request->file('image');
            $upload = 'img/posts/';
            $filename = $image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathName(), $upload . $filename);
        }

        $post = Post::find($id);
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        if (isset($filename)) $post->image = $filename;
        $post->save();

        Session::flash('post_alert', 'Post has been updated.');
        return redirect('admin/post');
    }

    public function destroy($id) {
        $post = Post::find($id);
        $imgpath = 'img/posts/' . $post->image;
        File::delete($imgpath);

        $post->delete();

        Session::flash('post_alert', 'Post has been deleted.');
        return redirect('admin/post');
    }
}
