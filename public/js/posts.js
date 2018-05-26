$(document).ready(function(){

    $('#postToEdit').on('change', function(){
        //console.log($(this).val());
        var postId = $(this).val();
        $.ajax({
                type: 'get',
                url:"/api/posts/" + postId,
                success: function(data) {
                    var title =  data['title'];
                    var message =  data['message'];

                    $('#title').val("test");
                    $('#message').val(message);
                    console.log(data)

                 },
                error: (error) => {
                  console.log(error);
                }
            });
    });
});
