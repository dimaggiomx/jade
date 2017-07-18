$(document).ready(function() {
    $(function() {
        $(".preloader").fadeOut();
        //FVSD $('#side-menu').metisMenu();
    });

    //alert('hola')

    // *************  FVSD

    $('#loginform').submit(function()
        {
            submitForm();

            return false;
        }
    );

});


function submitForm(){

    $.ajax({
        url: 'tempresas/ps_step3.php',
        type: 'POST',
        encoding:"UTF-8",
        data: $('#loginform').serialize(),
        dataType: 'json'
    })

        .done(function(data){

            $('#btn-signup').html('<img src="ajax-loader.gif" /> &nbsp; Concluyendo registro...').prop('disabled', true);

            setTimeout(function(){

                if ( data.status==='success' ) {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
                        $("#loginform").trigger('reset');
                        $('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Registro exitoso...').prop('disabled', false);
                    }).delay(5000).slideUp('fast');
                    setTimeout(function(){window.location.href=data.URL} , 5500);

                } else {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
                        //$("#loginform").trigger('reset');
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