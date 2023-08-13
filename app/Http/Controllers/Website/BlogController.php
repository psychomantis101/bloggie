<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        //if using php 8, can switch to named parameter
        $blogs = Blog::getLatestLiveBlogs(null, 12);

        return view('website.blog.index')->with([
            'blogs' => $blogs
        ]);
    }

    public function show(Blog $blog)
    {
        return view('website.blog.show')->with([
            'blog' => $blog
        ]);
    }

}
