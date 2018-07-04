<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

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
        $this->middleware('auth')->except(['welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('store')->with('status', 'Gelukt om in te loggen');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function welcome()
    {
        $user  = Auth()->user();
        $posts = Post::orderBy('created_at', 'desc')
        ->paginate(5);
        return view('layouts.welcome', compact('posts', 'user'));
    }

    public function cookies()
    {
        return view('layouts.cookies');
    }
}
