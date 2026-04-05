<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function blog()
    {
        return view('dashboard.blog');
    }

    public function createBlog(){
        return view('dashboard.createBlog');
    }
    
    public function setting(){
        return view('dashboard.setting');
    }
}
