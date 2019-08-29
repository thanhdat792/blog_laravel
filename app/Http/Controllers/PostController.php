<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
    	// get all post and comment attach information of comment owner
    	$posts = Post::with(['comments.user','user'])->get();
    	dump($posts->toArray());

    	return; 
    }
}
