$(document).ready(function() {
    $(function() {
        $(".preloader").fadeOut();
        //FVSD $('#side-menu').metisMenu();
    });

    //alert('hola')
    // *************  FVSD
    $('#subform').submit(function()
        {
            submitForm1();
            return false;
        }
    );

});


function submitForm1(){

    $.ajax({
        url: 'tsubastas/ps_step_subastas.php',
        type: 'POST',
        encoding:"UTF-8",
        data: $('#subform').serialize(),
        dataType: 'json'
    })

        .done(function(data){

            $('#btn-sub').html('<img src="ajax-loader.gif" /> &nbsp; Guardando...').prop('disabled', true);

            setTimeout(function(){

                if ( data.status==='success' ) {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
                        $("#subform").trigger('reset');
                        $('#btn-sub').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Registro exitoso...').prop('disabled', false);
                    }).delay(5000).slideUp('fast');
                    setTimeout(function(){window.location.href=data.URL} , 1500);
                } else {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
                        //$("#subform").trigger('reset');
                        $('#btn-sub').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Intenta de nuevo').prop('disabled', false);
                    }).delay(5000).slideUp('fast');

                }

            },3000);
        })
        .fail(function(){
            // $("#loginform").trigger('reset');
            alert('An unknown error occoured, Please try again Later...');
        });
}
