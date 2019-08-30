<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	/* 
		Link to comments table
		Relationship type : hasMany (a post may have multiple comments)
	*/
    public function comments() {
    	return $this->hasMany('App\Comment','postId');
    }

    /* 
		Link to users table
		Relationship type : belongsTo (a post belongs to only one user)
	*/
    public function user() {
    	return $this->belongsTo('App\User','user_id');
    }

	// Allow content field use Mass Assignment feature
    protected $fillable = [
    	'content'
  	];
}
