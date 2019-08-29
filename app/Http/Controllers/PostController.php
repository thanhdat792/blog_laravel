<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
    	$posts = Post::with(['comments','user'])->get();
    	dump($posts->toArray());

    	return; 
    }
}
