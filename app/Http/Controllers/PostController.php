<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
    	/*
			Get all post include : 	Post detail
								   	Information of owner post
									Comment of post and information of owner comment
									Reply comment of post and information of owner reply comment
    	*/
    	$posts = Post::with(['user','comments.user','comments.children.user'])->get();

    	return view('posts.index', ['posts' => $posts->toArray()]); 
    }
}
