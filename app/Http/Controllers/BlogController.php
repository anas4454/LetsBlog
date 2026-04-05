<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->get();

        // dd($blogs);

        return view('web-page.home' ,compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function blogDetail(Blog $blog)
    {
        return view('web-page.blogDetail' ,compact("blog"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save()
    {
        $saveBlog = '';
       return view('web-page.saveBlog' ,compact("saveBlog"));
    }

}
