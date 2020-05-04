<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',['posts' => Post::orderBy('created_at', 'desc')->limit(4)->get(),
        'numPost'=>Post::all()->count(),'numAuthors'=>User::all()->count(),
        'numTags'=>Tag::all()->count(),'numCategories'=>Category::all()->count()
        ]);
    }
}
