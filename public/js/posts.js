$(document).ready(function(){
    $('#test').hide();
    $('#postToEdit').on('change', function(){
        var postId = $(this).val();
    $.ajax({
        type: 'get',
        url:"/api/posts/" + postId,
        success: function(data) {
            var title =  data['title'];
            var message =  data['message'];
            var post_id = data['id'];
            $('#test').show();
            $('input[name="titleEdit"]').val(title);
            $("textarea#messageEdit").val(message);
            $("#post_id").val(post_id);
            CKEDITOR.instances.messageEdit.setData(message);
        },
        error: (error) => {
            console.log(error);
        }
        });
    });
});
