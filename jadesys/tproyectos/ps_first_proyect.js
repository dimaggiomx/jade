$(document).ready(function() {
    $(function() {
        $(".preloader").fadeOut();
    });


    $('#first_projectForm').submit(function()
        {
           // alert('HOLAAAAA');
            submitForm1();
            return false;
        }
    );

});


function submitForm1(){

    $.ajax({
        url: 'tproyectos/ps_first_proyect.php',
        type: 'POST',
        encoding:"UTF-8",
        data: $('#first_projectForm').serialize(),
        dataType: 'json'
    })

        .done(function(data){

            $('#completar1st').html('<img src="ajax-loader.gif" /> &nbsp; Guardando...').prop('disabled', true);

            setTimeout(function(){

                if ( data.status==='success' ) {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
                        $("#first_projectForm").trigger('reset');
                        $('#completar1st').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Registro exitoso...').prop('disabled', false);
                    }).delay(5000).slideUp('fast');
                    setTimeout(function(){window.location.href=data.URL} , 3500);

                } else {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
                        $('#completar1st').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Intenta de nuevo').prop('disabled', false);
                    }).delay(5000).slideUp('fast');

                }

            },3000);
        })
        .fail(function(){
            alert('An unknown error occoured, Please try again Later...');
        });
}