$(document).ready(function(){

    $("#status").delay(5000).slideUp(300);

    $("#subCat").hide();
   // console.log('JS loaded and ready to go');

    // Adding new product to datbase
    // First select Main Category
    // Then show Sub Categories based on Main Category selection
$(document).on('change', '#mainCat', updateSubcat)
    // Get selected value from Main Category
    function updateSubcat ()
    {
        //console.log($(this).find('option:selected').attr("value"));
        //$("#subCat").show();
        var $select = $(this);
        var mainCat = $select.val();
        var id = $(this).find('option:selected').attr("value");
        // send ajax request
        $.ajax({
            type: 'get',
            url:"/api/category/"+ id,
            data: {
                parent_id: mainCat
            },
            success: function(data) {
                //console.log(data);
                if(data.length === 0){
                    //console.log('No Sub categories found for ' + slug);
                    $('#subCat').hide();
                } else {
                    $("#subCat").show();
                    //console.log(data);
                    var options = '';
                    // you might want an empty option, so you could do
                    // var options = '<option value=""></option>';

                    // assuming that your data is being return as json
                    $.each(data['sub_categories'], function(i, item) {
                        // loop through the json and create an option for each result
                        options += '<option value="' + item.id + '">' + item.name + '</option>';
                    });

                    $('#subCat').empty().html(options);
                    // the empty isn't needed since
                    // .html() will replace the contents
                    // but it's just to make it obvious what is happening
                }
            }
        });
    } // updateSubcat function close

    // If admin wants to add a new category, he gets to choose between MainCat and SubCat.
    // If MainCat has been chosen, we add it to categories table
    // If Subcat has been chosen, we add it to sub_categories table
    $(document).on('change', '#CatType', adminCategories)
        $('#belongsToCat').hide();

        function adminCategories ()
        {
            var $select = $(this);

            var mainCat = $select.val();

            if(mainCat === 'subCat')
            {
                $('#belongsToCat').show();
            } else {
                $('#belongsToCat').remove();
            }
        } // adminCategories function close
}); // Document.ready close

