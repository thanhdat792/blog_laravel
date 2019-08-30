<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Log;

class PostController extends Controller
{
    public function index() {
    	/*
			Retrieve the latest 5 posts include : - Post detail
								   	              - Information of owner post
									              - Comment of post and information of owner comment
									              - Reply comment of post and information of owner reply comment
    	*/
        $relationsParram = array('user','comments.user','comments.children.user');
    	$posts = Post::with($relationsParram)->orderBy('id', 'DESC')->take(5)->get();

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

    /*
        Load Method Method
        Input : current page number (send from Jquery Ajax)
        Output : 5 next post (json type) 
    */
    public function loadMore() {
        if (request()->currentPage) {
            $currentPage = request()->currentPage;
            $relationsParram = array('user','comments.user','comments.children.user');
            $getNextFromPost = $currentPage * 5;
            $posts = Post::with($relationsParram)->orderBy('id','DESC')->take(5)->skip($getNextFromPost)->get();

            Log::Info($posts);

            return $posts->toJson(JSON_PRETTY_PRINT);
        }
    }
}
