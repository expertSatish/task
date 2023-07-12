<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $blogs = Blog::where('user_id',auth()->user()->id)->get();
        return view('dashboard',compact('blogs'));
    }
    public function blogDetail($slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        return view('blog_detail',compact('blog'));
    }
    
}
