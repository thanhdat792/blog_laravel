<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Log;

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

    /*
        Create Post Method
        Input : content of post (send from Jquery Ajax)
        Output : new post detail (json type) 
    */
    public function create() {
        if (request()->content) {
            $currentUserId = 1;
            $post = new Post(request()->all());
            $post->user_id = $currentUserId;
            // save post to db
            if ($post->save()) {
                return Post::with('user')->find($post->id)->toJson(JSON_PRETTY_PRINT);
            }
        }
    }
}
