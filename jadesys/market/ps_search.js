$(document).ready(function() {
    $(function() {
        $(".preloader").fadeOut();
        //FVSD $('#side-menu').metisMenu();
    });

    //alert('hola')

    // *************  FVSD

    $('#searchMe').submit(function()
        {
            submitForm();

            return false;
        }
    );

});


function submitForm(){
/*
    $.ajax({
        url: 'market/ps_search.php',
        type: 'POST',
        encoding:"UTF-8",
        data: $('#searchMe').serialize(),
        dataType: 'json'
    })

        .done(function(data){

            $('#btn-signup').html('<img src="ajax-loader.gif" /> &nbsp; Concluyendo registro...').prop('disabled', true);

            setTimeout(function(){

                if ( data.status==='success' ) {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
                        $("#searchMe").trigger('reset');
                        $('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Registro exitoso...').prop('disabled', false);
                    }).delay(5000).slideUp('fast');
                   // setTimeout(function(){window.location.href=data.URL} , 5500);

                } else {

                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
                        //$("#searchMe").trigger('reset');
                        $('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Intenta de nuevo').prop('disabled', false);
                    }).delay(5000).slideUp('fast');

                }

            },3000);
        })
        .fail(function(){
            // $("#loginform").trigger('reset');
            alert('An unknown error occoured, Please try again Later...');
        });
    */

alert('Ya no aplica');
}

function paginateMe(page){


    document.getElementById('page').value = page;
    //alert('Pulsado '+page);

    // do what you like with the input
    //$inputExtra = $('<input type="text" name="pageData" id="pageData"/>').val(page);

    // append to the form
    //$('#searchMe').append($inputExtra);

    $.ajax({
        url: 'market/ps_search.php',
        type: 'POST',
        encoding:"UTF-8",
        data: $('#searchMe').serialize(),
        dataType: 'json'
    })

        .done(function(data){

            $(".preloader").fadeIn();
            setTimeout(function(){

                if ( data.status==='success' ) {
                    $(".preloader").fadeOut();
                    //$('#errorDiv').slideDown('fast', function(){
                        //$('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
                        $('#resDiv').html(data.result);
                        //$("#loginform").trigger('reset');
                    //}).delay(3000).slideUp('fast');

                } else {
                    $(".preloader").fadeOut();
                    //$('#errorDiv').slideDown('fast', function(){
                        //$('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
                        $('#resDiv').html(data.result);
                    //}).delay(3000).slideUp('fast');
                }

            },3000);
        })
        .fail(function(){
            // $("#loginform").trigger('reset');
            alert('An unknown error occoured, Please try again Later...');
        });

}


function init()
{
    paginateMe(1);
}