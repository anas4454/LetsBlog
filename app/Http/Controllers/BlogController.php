<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Favourite;
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


    public function wishlist()
    {
        $saveBlog = Favourite::where('user_id', Auth::id())->with('blog')->get();
        return view('web-page.saveBlog', compact('saveBlog'));
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

        Favourite::create([
            'user_id' => $user->id,
            'blog_id' => $blog->id,
        ]);

        return redirect()->back()->with('success', 'Blog saved to favourites successfully.');
    }


    public function unsave($id)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        $blog = Blog::findOrFail($id);

        Favourite::where('user_id', $user->id)
            ->where('blog_id', $blog->id)
            ->delete();

        return redirect()->back()->with('success', 'Blog removed from favourites successfully.');
    }
    
}
