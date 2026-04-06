<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard(Blog $blog)
    {
        $blogs = Blog::count();
        $favourite = Favourite::count();
        return view('dashboard.dashboard' , compact('blogs' ,'favourite' ));
    }

    public function blog()
    {
        $blogs = Blog::where('writer_id' , Auth::id())->latest()->get();
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
            'writer_id'=>Auth::id(),
            'user_id'=>Auth::id(),

        ]);

        return redirect()->route('dashboard.blog')->with('success' , 'Blog created successfully');
    }

    public function deleteBlog($id){

        Blog::where('id' , $id)->delete();

        return redirect()->route('dashboard.blog')->with('message' , 'you delete your blog');
    }


}
