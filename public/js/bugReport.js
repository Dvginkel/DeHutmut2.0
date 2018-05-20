$(document).ready(function(){
    console.log("Bug Reporter Loaded...");

     $(document).on('mouseover', 'div', function(e) {
        console.log($(e.target).attr('id'));
    });

}); // Close document ready
