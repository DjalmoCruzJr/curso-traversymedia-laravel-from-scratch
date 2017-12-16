<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Post;

class DashboardController extends Controller
{
    private $_paginationSize = 4;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $posts = Post::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate($this->_paginationSize);
        return view('dashboard')->with('posts', $posts);
    }
}
