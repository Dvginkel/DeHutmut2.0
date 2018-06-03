$(document).ready(function () {
    $('#msgSuccess').fadeOut(3000);
    $('#message').fadeOut(3000);
    $('#saveBtn').hide();
    $('#mailChangedMessage').hide();
    $('#status').fadeOut(3000);

    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }

    $('#appointmentProduct').on('change', function () {
        console.log($(this).val());
        var productName = $(this).val();
        $('#productnaamLabel').text(productName);
    });

    $('#changeMail').on('click', function () {
        $('#saveBtn').show();
        $('#oldEmail').hide();
        $('#changeMail').hide();
        $('<input type="email" id="newEmail" name="email" placeholder="Vul je nieuwe e-mailadres in." class="form-control">').insertAfter("#oldEmail");

    });

    $('#updateEmailñ').on('click', function () {
        var newEmailInput = $('#newUserMail').val();
        var newEmailInputConfirm = $('#newUserMailConfirm').val();
        //console.log(newEmailInput + ' ' + newEmailInputConfirm);

        if (newEmailInputConfirm !== newEmailInput) {
            // mail adressen zijn niet gelijk aan elkaar. 
            // Gebruiker op de hoogte stellen.
            $("<div class='alert alert-warning alert-dismissible fade show mt-1 mr-1 ml-1' id='test'>E-mailadressen komen niet overeen met elkaar.</div>").insertBefore($(".modal-body"));
            $('#test').prepend($("<div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"));
            console.log('E-mailadressen komen niet overeen met elkaar.');
        } else {
            if (!validateEmail(newEmailInput)) {
                console.log('Onjuist format');
                $("<div class='alert alert-warning alert-dismissible fade show mt-3 mr-1 ml-1' id='test'>Invoer is geen geldig e-mailadres.</div>").insertBefore($(".modal-body"));
                $('#test').prepend($("<div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"));
                $('#test').fadeOut(4000);
            } else {
                $.ajax({
                    type: 'post',
                    url: "/account/info",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        email: newEmailInputConfirm,
                    },
                    success: function (data) {
                        //console.log(data);
                        $('#oldEmail').text(newEmailInputConfirm);
                        $('#exampleModal').modal('toggle');
                        $('#changeMail').show();
                        $('#mailChangedMessage').show();
                        $('#mailChangedMessage').text('Je e-mailadres is gewijzigd.');
                        $('#mailChangedMessage').fadeOut(3000);
                        $('#newUserMail').val('');
                        $('#newUserMailConfirm').val('');
                    },
                    error: (error) => {
                        if (error['responseJSON']['message'] === 'The given data was invalid.') {
                            var message = "Er is een ongeldig e-mailadres ingevult.";
                            $('#mailChangedMessage').show();
                            $('#mailChangedMessage').text(message);
                            $('#mailChangedMessage').fadeOut(6000);
                        }
                        console.log(error['responseJSON']['message']);

                    }
                });
            }
        }
    });

    $('#navbarDropdown').mouseover(function () {

        $('#navbarDropdown').dropdown('toggle')


    });
    
});