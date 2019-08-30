$(document).ready(function() {
    $(".post").click(function(){
        var content = $('.post-message').val();
        $.ajax({
                method: "POST",
                url: '/timeline/public/posts/create',
                dataType: 'json',
                data: {
                    content : content
                },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                },
                success: function (data) {
                    console.log(data);
                }
            });
    });
});