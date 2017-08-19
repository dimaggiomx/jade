$(document).ready(function() {
    $(function() {
        $(".preloader").fadeOut();
        //FVSD $('#side-menu').metisMenu();
    });

    //alert('hola')
    // *************  FVSD
    $('#investform').submit(function()
        {
            submitForm1();
            return false;
        }
    );


});


function submitForm1(){

    $.ajax({
        url: 'tinversion/ps_step_invest.php',
        type: 'POST',
        encoding:"UTF-8",
        data: $('#investform').serialize(),
        dataType: 'json'
    })

        .done(function(data){

            $('#btn-signup').html('<img src="ajax-loader.gif" /> &nbsp; Guardando...').prop('disabled', true);

            setTimeout(function(){

                if ( data.status==='success' ) {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
                        $("#investform").trigger('reset');
                        $('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Registro exitoso...').prop('disabled', false);
                    }).delay(5000).slideUp('fast');

                } else {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
                        //$("#proyectform").trigger('reset');
                        $('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Intenta de nuevo').prop('disabled', false);
                    }).delay(5000).slideUp('fast');

                }

            },3000);
        })
        .fail(function(){
            // $("#loginform").trigger('reset');
            alert('An unknown error occoured, Please try again Later...');
        });
}
