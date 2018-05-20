$(document).ready(function(){
    $('#msgSuccess').fadeOut(3000);
    $('#message').fadeOut(3000);
    $('#saveBtn').hide();
    $('#mailChangedMessage').hide();


    $('#appointmentProduct').on('change', function(){
        console.log($(this).val());
        var productName = $(this).val();
        $('#productnaamLabel').text(productName);
    });

    $('#changeMail').on('click', function(){
        $('#saveBtn').show();
        $('#oldEmail').hide();
        $('#changeMail').hide();
        $('<input type="email" id="newEmail" name="email" placeholder="Vul je nieuwe e-mailadres in." class="form-control">').insertAfter( "#oldEmail" );

    });

    $('#saveBtn').on('click', function(){
        var newEmailInput =  $('#newEmail').val();
        $.ajax({
                type: 'post',
                url:"/account/info",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email: newEmailInput,
                },
                success: function(data) {
                    //console.log(data);
                    $('#oldEmail').show();
                    $('#newEmail').hide();
                    $('#oldEmail').text(newEmailInput);
                    $('#saveBtn').hide();
                    $('#changeMail').show();
                    $('#mailChangedMessage').show();
                    $('#mailChangedMessage').text('Je e-mailadres is gewijzigd.');
                    $('#mailChangedMessage').fadeOut(5000);
                },
                error: (error) => {
                    if(error['responseJSON']['message'] === 'The given data was invalid.')
                    {
                        var message = "Er is een ongeldig e-mailadres ingevult.";
                        $('#mailChangedMessage').show();
                        $('#mailChangedMessage').text(message);
                        $('#mailChangedMessage').fadeOut(6000);
                    }
                     console.log(error['responseJSON']['message']);

                }
        });
    });
});
