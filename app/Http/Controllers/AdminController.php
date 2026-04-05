<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function blog()
    {
        $blogs = Blog::where('userId' , Auth::id())->latest()->get();
        return view('dashboard.blog', compact('blogs'));
    }

    public function createBlog()
    {
        return view('dashboard.createBlog');
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);

        $imagepath = null;
        if(request()->hasFile('image')){
            $imagepath= $request->file('image')->store('blog-images' , 'public');
        }

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'image' => $imagepath,
            'description' => $request->description,
            'writerId'=>Auth::id(),
            'userId'=>Auth::id(),

        ]);

        return redirect()->route('dashboard.blog')->with('success' , 'Blog created successfully');
    }


}
