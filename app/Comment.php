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
}
