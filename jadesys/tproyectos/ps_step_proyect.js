$(document).ready(function() {
    $(function() {
        $(".preloader").fadeOut();
        //FVSD $('#side-menu').metisMenu();
    });

    //alert('hola')
    // *************  FVSD
    $('#proyectform').submit(function()
        {
            submitForm1();
            return false;
        }
    );

    $('#videoform').submit(function()
        {
            submitForm2();
            return false;
        }
    );



});


function submitForm1(){

    $.ajax({
        url: 'tproyectos/ps_step_proyect.php',
        type: 'POST',
        encoding:"UTF-8",
        data: $('#proyectform').serialize(),
        dataType: 'json'
    })

        .done(function(data){

            $('#btn-proyect').html('<img src="ajax-loader.gif" /> &nbsp; Guardando...').prop('disabled', true);

            setTimeout(function(){

                if ( data.status==='success' ) {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
                        $("#proyectform").trigger('reset');
                        $('#btn-proyect').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Registro exitoso...').prop('disabled', false);
                    }).delay(5000).slideUp('fast');

                } else {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
                        //$("#proyectform").trigger('reset');
                        $('#btn-proyect').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Intenta de nuevo').prop('disabled', false);
                    }).delay(5000).slideUp('fast');

                }

            },3000);
        })
        .fail(function(){
            // $("#loginform").trigger('reset');
            alert('An unknown error occoured, Please try again Later...');
        });
}

function submitForm2(){

    $.ajax({
        url: 'tproyectos/ps_step_proyect2.php',
        type: 'POST',
        encoding:"UTF-8",
        data: $('#videoform').serialize(),
        dataType: 'json'
    })

        .done(function(data){

            $('#btn-video').html('<img src="ajax-loader.gif" /> &nbsp; Guardando...').prop('disabled', true);

            setTimeout(function(){

                if ( data.status==='success' ) {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
                        $("#videoform").trigger('reset');
                        $('#btn-video').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Registro exitoso...').prop('disabled', false);
                    }).delay(5000).slideUp('fast');

                } else {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
                        //$("#videoform").trigger('reset');
                        $('#btn-video').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Intenta de nuevo').prop('disabled', false);
                    }).delay(5000).slideUp('fast');

                }

            },3000);
        })
        .fail(function(){
            // $("#loginform").trigger('reset');
            alert('An unknown error occoured, Please try again Later...');
        });
}