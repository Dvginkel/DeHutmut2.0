$(document).ready(function(){
    $('#resetSearch').hide();
    $('#resetSearch').on('click', function(){
        $('#defaultLoadedProducts').show();
    });
    $('#search').on('click', function(){
        var searchparams = [];
        // Gebruiker heeft filter(s) ingesteld.
        // Check what search params need to be used.

        var size = $('#size').val();
        var color = $('#color').val();
        var age = $('#age').val();
        var colorValue = '';

        if(size == 'Maat'){
             console.log('Niet op ' + size + ' filteren / zoeken');
        } else {
            if(size.indexOf('-') > -1){
                //console.log('Koppelstreepje gevonden');
                var test = size.split('-');
                var minValue = test[0];
                var maxValue = test[1];
                var size = {
                    minSize: minValue,
                    maxSize: maxValue,
                }
            } else {
                size = size;
            }
        }

        if(color == 'Kleur'){
             console.log('Niet op ' + color + ' filteren / zoeken');
        } else {
            color = color;
        }

         if(age.indexOf('-') > -1){
                //console.log('Koppelstreepje gevonden');
                var test = age.split('-');
                var minValue = test[0];
                var maxValue = test[1];
                var age = {
                    minValue,
                    maxValue,
                }
        } else {
            age = age;
        }

        $.ajax({

                type: 'POST',
                url:"/products/search",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    sizeSearchValue: size,
                    //minSearchValue: minValue,
                    maxSearchValue: maxValue,
                    colorSearchValue: color,
                    AgeSearchValue: age,


                },
                success: function(data) {
                    // We have some results. Let's display them
                    $('#resetSearch').show();
                    $('#defaultLoadedProducts').hide();


                    console.log(data);

                 },
                error: (error) => {
                  console.log(error);
                }
            });


    });

    // var searchTerms = []; // searchTerms.push('some value');

    // $('#size').on('change', function(){
    //     var value = $(this).val();

    //     var Color = $('#color').val();
    //     var Age = $('#age').val();

    //     if(value.indexOf('-') > -1)
    //     {
    //         var test = value.split('-');
    //         var minValue = test[0];
    //         var maxValue = test[1];
    //         searchTerms.push(minValue);
    //         searchTerms.push(maxValue);
    //     } else {
    //          searchTerms.push(value);
    //     }
    // });
    // $('#color').on('change', function(){
    //     var value = $(this).val();
    //     searchTerms.push(value);
    //    // console.log(value);
    // });

    // $('#age').on('change', function(){
    //     var value = $(this).val();
    //     searchTerms.push(value);
    //     //console.log(value);
    // });

    // console.log(searchTerms);

    // // Full text search
    // $('#search').keyup(function() {
    //     console.log($(this).val());
    // });
});
