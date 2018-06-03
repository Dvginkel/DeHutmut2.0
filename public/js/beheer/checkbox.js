$(document).ready(function () {

    $("#categoryActive").change(function () {
        var $input = $(this);
        var checkboxStatus = $input.is(":checked");
        var itemId = $input.val();

        if (checkboxStatus === false) {
            // checkbox has been unchecked. Set active column to zero (0)
            $.ajax({
                type: 'POST',
                url: "/api/category/" + itemId + "/update",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    active: 0
                },
                success: function (data) {
                    console.log(data['data']);
                }
            });
        } else {
            // checkbox has been checked, set active column to one (1)
            $.ajax({
                type: 'POST',
                url: "/api/category/" + itemId + "/update",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    active: 1
                },
                success: function (data) {
                    console.log(data['data']);

                }
            });
        }

    });

    $('.delete').on('click', function () {
        var id = $(this).val();

        $.ajax({
            type: 'POST',
            url: '/api/user/delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function (data) {
                console.log(data);
            }
        });


        console.log("Delete " + $(this).val());
    });
    $('.block').on('click', function () {
        console.log("Block " + $(this).val());
    });
    $('.deactivate').on('click', function () {
        console.log("Deactivate " + $(this).val());
    });

});