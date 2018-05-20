$(document).ready(function(){
    var selectedSize = "";

    // $('#productSize').focus(function(){
    //     console.log($(this).val());
    //     var selectedSize = $(this).val();
    // });

    $('#productSize').focusout(function(){
        console.log($(this).val());
        var selectedSize = $(this).val();
        $.ajax({
            type: 'get',
            url:"/api/size/"+ selectedSize,
            data: {
                selectedSize: selectedSize
            },
            success: function(data) {
                console.log(data);
                console.log(data[0]['age']);

                if(data[0]['size'] <= 86){
                    // Gekozen maat is niet groter of gelijk aan 86, 18 maanden max
                    console.log('maanden');
                    var text =  " Maanden";

                } else {
                    var text = " Jaar";
                }



                $('#productAge').val(data[0]['age'] + text);
            }
        });
    });
    $('#size').focusout(function(){
        console.log($(this).val());
        var selectedSize = $(this).val();
        $.ajax({
            type: 'get',
            url:"/api/size/"+ selectedSize,
            data: {
                selectedSize: selectedSize
            },
            success: function(data) {
                console.log(data);
                console.log(data[0]['age']);

                if(data[0]['size'] <= 86){
                    // Gekozen maat is niet groter of gelijk aan 86, 18 maanden max
                    console.log('maanden');
                    var text =  " Maanden";

                } else {
                    var text = " Jaar";
                }



                $('#age').val(data[0]['age'] + text);
            }
        });
    });
});
