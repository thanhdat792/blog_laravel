@extends('layouts.default')

@section('content')
	<div class="container-fluid" id="wrapper">  
	    <div class="row">
	    	<div class="hidden-xs col-sm-4 col-md-3">
            	<!--left menu-->
         	</div>
         	<div class="col-xs-12 col-sm-8 col-md-6">
	            <div class="input-group">
	            	<input type="hidden" name="_csrfToken" value="{{ csrf_token() }}" />
	               <input class="post-message form-control" type="text" name="content" placeholder="Make a post...">
	               <span class="input-group-btn">
	                 <button class="post btn btn-success" type="submit" name="post">Post</button>
	               </span>
	            </div><hr>
	            <!--post-->
	            <div id="main">
	               	@foreach($posts as $post)
		                <div class="panel panel-default">
		                    <!-- post header -->
		                    <div class="panel-heading" >
		                        <h3 class="panel-title">
		                           	<a href="javascript:void(0)">
		                              	<div class="post-header">
		                                 	<div class="post-header-avatar">
		                                    	<a href="javascript:void(0)">
		                                        	<img src="{{asset($post['user']['avatar'])}}" class = "media-object img-rounded post-user-avatar">
		                                    	</a>
		                                 	</div>
		                                 	<div class="post-header-body">
		                                       	<span>
		                                          	<a href="javascript:void(0)">
		        										{{$post['user']['username']}}
		                                          	</a>
		                                       	</span><br>
		                                    <small><span><time>22 minutes </time></span><span>ago</span></small>
		                                 	</div>
		                              	</div>
		                           	</a>
		                        </h3>
		                    </div>
		                    <!-- post body -->
		                    <div class="panel-body">
		                        <div>
		                           	<p class="text-post">
										{{$post['content']}}
		                           	</p>
		                        </div>
		                        <div style = "border-top:2px solid #EDEDED;padding-top:10px">  
		                           	<div align = "center" class = "col-xs-4 col-sm-4 col-md-4">
		                              	<a href="javascript:void(0)">
		                                 	<span  data-toggle="tooltip" data-placement="bottom" title="Like">
		                                    	<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>  Like
		                                 	</span>
		                              	</a>
		                           	</div>
		                           	<div align = "center" class = "col-xs-4 col-sm-4 col-md-4">
		                              	<a href="javascript:void(0)">
		                                 	<span  data-toggle="tooltip" data-placement="bottom" title="Comment">
		                                    	<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>  Comment
		                                 	</span>
		                              	</a>
		                           	</div>
		                           	<div align = "center" class = "col-xs-4 col-sm-4 col-md-4">
		                              	<a href="javascript:void(0)">
		                                 	<span  data-toggle="tooltip" data-placement="bottom" title="Share">
		                                    	<span class="glyphicon glyphicon-share" aria-hidden="true"></span>  Share
		                                 	</span>
		                              	</a>
		                           </div>
		                        </div>
		                    </div>
		                    <!-- post footer -->
		                    <div class="panel-footer">
		                        <div class = "comment-list" id = "{{$post['id']}}">
		                        	@foreach($post['comments'] as $comment)
			                            <div class="comment">
			                                <div class="comment-avatar-user">
			                                    <a href="javascript:void(0)">
			                                    	<img src="{{asset($comment['user']['avatar'])}}" class = "media-object img-rounded comment-user-avatar">
			                                    </a>
			                                </div>
			                                <div class = "comment-body" id = "{{$comment['id']}}">
			                                    <div class = "sub-comment"  id = "{{'parent-comment-' . $comment['id']}}">
			                                       	<p class="" style = "margin: 0;padding: 0;"> 
			                                          	<span>
			                                          		<a href="javascript:void(0)">
			                                          			{{$comment['user']['username']}}
			                                          		</a>
			                                          		{{$comment['message']}}
			                                          	</span>
			                                       	</p>
			                                       	<p class="comment" style = "margin: 0;padding: 0;"> 
			                                          	<small>
			                                             	<span> <a href="javascript:void(0)">Like </a></span> 
			                                             	<span><a href="javascript:void(0)">Comment </a></span>
			                                          	</small> 
			                                          	<small><span><time>22 min </time></span><span>ago</span></small>
			                                       	</p>
			                                       	@if(isset($comment['children']))
			                                       		@foreach($comment['children'] as $subComment)
					                                        <div class = "sub-comment-item">
					                                            <div class = "comment">
					                                               	<div class = "comment-avatar-user">
					                                                  	<a href="javascript:void(0)">
					                                                    	<img src="{{asset($subComment['user']['avatar'])}}" class = "media-object img-rounded sub-comment-user-avatar"> 
					                                                  	</a>
					                                               	</div>
					                                               <div class="comment-body">
					                                                  	<p style = "margin: 0;padding: 0;" class="comment"> 
						                                                    <span>
						                                                        <a href="javascript:void(0)">{{$subComment['user']['username']}}</a>
						                                                    </span>{{$subComment['message']}}
					                                                  	</p>
					                                                  	<div>
					                                                     	<small>
					                                                     		<span> <a href="javascript:void(0)">Like </a></span> <span> <a href="javascript:void(0)">Comment </a></span>
					                                                     	</small>
					                                                     	<small><span><time>2 min </time></span><span>ago</span>
					                                                     	</small>
					                                                  	</div>
					                                               </div>
					                                            </div>
					                                        </div>
					                                    @endforeach
				                                    @endif
			                                    </div>
			                                    <img src="{{asset($comment['user']['avatar'])}}" class = "img-rounded sub-comment-user-avatar">
			                                    <input class = "comment-typing sub-comment-typing" id = "" placeholder=" Write a comment...">
			                                </div>
			                            </div>
			                        @endforeach 
		                        </div>
		                        <img src="{{asset($post['user']['avatar'])}}" class = "img-rounded comment-user-avatar">
		                        <input class = "comment-typing" id = "{{$post['id']}}" placeholder=" Write a comment...">
		                    </div>
		                </div>
					@endforeach
				</div>
				<button  data-toggle="tooltip" data-placement="bottom" title="Load More" class = "btn btn-success load-more" type="button" style="margin-bottom:15px;width:100%;">
                LOAD MORE 
            </button>
	        </div>
	    </div>
	    <!---Sidebar menu started-->
        <div class="hidden-xs hidden-sm col-md-3">
            
        </div>
	</div>
@endsection
