<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->get();

        // dd($blogs);

        return view('web-page.home', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function blogDetail(Blog $blog)
    {
        return view('web-page.blogDetail', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save($id)
    {

        if (! Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        $blog = Blog::findOrFail($id);

        if ($user->favouriteBlogs()->where('blog_id', $blog->id)->exists()) {
            $user->favouriteBlogs()->detach($id);

            return redirect()->back()->with('success', 'Blog unsaved');
        } else {
            $user->favouriteBlogs()->attach($id);

            return redirect()->back()->with('success', 'Blog saved');
        }

    }
}
