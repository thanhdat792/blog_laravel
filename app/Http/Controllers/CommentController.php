<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller {

	/*
		Add Comment Method
		Input : message of comment,parent_id(id of comment need reply),post id (send from Jquery Ajax)
        Output : new comment detail (json type)
	*/
    public function addComment() {
    	$currentUserId = Auth::user()->id;
		if (request()->message) {
			$comment = new Comment(request()->all());
			$comment->userId = $currentUserId;
			if ($comment->save()) {
				return Comment::with('user')->find($comment->id)->toJson(JSON_PRETTY_PRINT);
			}
		}
    }
}
