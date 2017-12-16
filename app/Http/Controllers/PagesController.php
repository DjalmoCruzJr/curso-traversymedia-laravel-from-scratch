<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'about', 'contact', 'services']]);
    }
    
    public function index() {
        if(auth()->user()){
            return redirect('/dashboard');
        }
        $title = 'Welcome to Laravel';
        $description = "This is the laravel application from the \"Laravel From Scratch\" Youtube Series by <a href=\"#\">Traversy Media</a>";
            return view('pages.index')->with(['title' => $title, 'description' => $description]);
    }

    public function about(){
        $title = 'About Us';
         return view('pages.about')->with('title', $title);
    }
     
    public function services() {
        $data = [
            'title' => 'What We Do',
            'services' => ['Web Design', 'Programming', 'SEO']
        ];
         return view('pages.services')->with($data);
    }
     
    public function contact() {
        $title = 'Contact Us';
         return view('pages.contact', compact('title'));
    }
}
