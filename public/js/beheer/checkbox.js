$(document).ready(function(){

    $( "#categoryActive" ).change(function() {
        var $input = $( this );
        var checkboxStatus = $input.is( ":checked" );
        var itemId = $input.val();

        if(checkboxStatus === false){
            // checkbox has been unchecked. Set active column to zero (0)
            $.ajax({
                type: 'POST',
                url:"/api/category/"+ itemId + "/update",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    active: 0
                },
                success: function(data) {
                       console.log(data['data']);
                }
            });
        } else {
            // checkbox has been checked, set active column to one (1)
            $.ajax({
                type: 'POST',
                url:"/api/category/"+ itemId + "/update",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    active: 1
                },
                success: function(data) {
                   console.log(data['data']);

                }
            });
        }

    });

});
