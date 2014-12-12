$(document).ready(function(){

    $( "#userAdd" ).on( "change", function( event ) {

        var post = $( this ).serialize();

        $.ajax({
            url: '/user/index/add',
            type: "POST",
            data: post,
            success: function(result) {
                if(result){

                    $('#info').remove();
                    $('#content').prepend('<div class="alert alert-success" role="alert" id="info">Kayıt Başarılı</div>');

                }
            }

        });

        $('.input-group.date').datepicker({
            format: "yyyy-mm-dd",
            startDate: "1980-01-01",
            endDate: "2020-01-01",
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true


        });

    });

});