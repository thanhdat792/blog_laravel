$(document).ready(function() {
    $(".post").click(function(){
        var content = $('.post-message').val();
        $.ajax({
                method: "POST",
                url: baseUrl + '/posts/create',
                dataType: 'json',
                data: {
                    content : content
                },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                },
                success: function (data) {
                    // init new post
                    var post = $('<div>').attr({class: 'panel panel-default'}).prependTo($('#main'));

                    /* Part header of post*/
                    var post_header = $('<div>').attr({class:'panel-heading'}).appendTo($(post));
                    var post_header_title = $('<h3 class="panel-title"><a href="javascript:void(0)"><div class="post-header"></div></a></h3>').appendTo($(post_header));
                    var post_header_avatar = $('<div>').attr({class:'post-header-avatar',}).appendTo($(post_header_title));
                    $('<a href="javascript:void(0)"><img src="'+ baseUrl + data.user.avatar +'" alt="" class="media-object img-rounded post-user-avatar"></a>').appendTo($(post_header_avatar));
                    var post_header_body = $('<div>').attr({class:'post-header-body',}).appendTo($(post_header_title));
                    $('<span> <a href="javascript:void(0)">' + data.user.username +'</a> </span><br> <small><span><time>22 minutes</time></span><span>ago</span></small>').appendTo($(post_header_body));
                    /* End part header of post*/ 

                    /* Part content of post*/
                    var post_content = $('<div>').attr({ class:'panel-body',}).appendTo($(post));
                    $('<div><p class="text-post">' + data.content + '</p></div>').appendTo($(post_content));
                    $('<div style = "border-top:2px solid #EDEDED;padding-top:10px"> <div align = "center" class = "col-xs-4 col-sm-4 col-md-4"> <a href="javascript:void(0)"> <span data-toggle="tooltip" data-placement="bottom" title="Like"> <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Like </span> </a> </div> <div align = "center" class = "col-xs-4 col-sm-4 col-md-4"> <a href="javascript:void(0)"> <span data-toggle="tooltip" data-placement="bottom" title="Comment"> <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comment </span> </a> </div> <div align = "center" class = "col-xs-4 col-sm-4 col-md-4"> <a href="javascript:void(0)"> <span data-toggle="tooltip" data-placement="bottom" title="Share"> <span class="glyphicon glyphicon-share" aria-hidden="true"></span> Share </span> </a> </div> </div>').appendTo($(post_content));
                    /* End part content of post*/                   

                    /* Part footer of post*/
                    var post_footer = $('<div>').attr({class:'panel-footer',}).appendTo($(post));
                    var comment_list = $('<div>').attr({class:'comment-list',id: data.id}).appendTo($(post_footer));
                    $('<img src="' + baseUrl + data.user.avatar + '" alt="" class="img-rounded comment-user-avatar">').appendTo($(post_footer));
                    $('<input class="comment-typing" id="' + data.id + '" placeholder=" Write a comment..." style="margin-left:3px;">').appendTo($(post_footer));
                    /* End part footer of post*/

                    //empty input after create post success
                    $('.post-message').val('');
                }
            });
    });
});