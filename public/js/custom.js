$(document).ready(function(){

    $( "#userupdate" ).on( "change", function( event ) {

        var post = $( this ).serialize();

        $.ajax({
            url: '/user/index/update',
            type: "POST",
            data: post,
            success: function(result) {
                if(result){

                    $('#info').remove();
                    $('#content').prepend('<div class="alert alert-success" role="alert" id="info">informations updated</div>');


                }
            }
        });

    });


});