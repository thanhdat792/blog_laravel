<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    /* 
		Link to users table
		Relationship type : belongsTo (a comment belongs to only one user)
	*/
    public function user() {
		return  $this->belongsTo('App\User','userId');
    }
   	// get reply comment
    public function children() {
	    return $this->hasMany('App\Comment', 'parent_id', 'id');
	}
	// Allow fields list use Mass Assignment feature
    protected $fillable = [
    	'postId','message','parent_id'
  	];
}
