<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Test;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $category=Category::paginate(6);
        $posts=Post::paginate(6);
        $tests=Test::paginate(6);
        return view('index',compact('category','posts','tests'));
    }
    public function about(){
        return view('about');
    }

    public function tests()
    {
        $tests=Test::all();
        return view('tests',compact('tests'));
    }
    public function posts()
    {
        $posts=Post::all();
        return view('posts',compact('posts'));
    }
}
