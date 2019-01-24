$(document).ready(function(){
    $('#status').fadeOut(4000);
    $('#faqForm').hide();
    $('#faqDelete').hide();



    $('#questionToEdit').on('change', function(){
        //console.log($(this).val());
        var faqId = $(this).val();

        $.ajax({
            type: 'get',
            url: "/api/faq/"+ faqId,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            
            success: function (data) {
                console.log(data);

                $('#faqQuestion').val(data['question']);
                $('#faqAnwser').val(data['anwser']);
                $('#faqId').val(data['id']);

                $('#faqForm').fadeIn(1000);
                $('#faqDelete').fadeIn(1000);
            },
            error: (error) => {
                
                console.log(error);

            }
        });
        
    });
});
