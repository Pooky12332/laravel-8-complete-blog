<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller {
    public function __construct() {
        $this -> middleware('auth') -> except(['index']);
    }

    public function index() {
        $latestPosts = Post::latest()->take(5)->get();
        $recommendedPosts = Post::inRandomOrder()->take(5)->get();
        return view('index', compact('latestPosts', 'recommendedPosts'));
    }
}
