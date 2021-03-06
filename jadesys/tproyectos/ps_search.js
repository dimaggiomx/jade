/**
 * Created by xion on 01/08/17.
 */
$(document).ready(function() {
    $(function() {
        $(".preloader").fadeOut();
        //FVSD $('#side-menu').metisMenu();
    });

    // *************  FVSD
    $('#searchMe').submit(function()
        {
            paginateMe(1);

            return false;
        }
    );
});


function paginateMe(page){


    document.getElementById('page').value = page;
    //alert('Pulsado '+page);

    // do what you like with the input
    //$inputExtra = $('<input type="text" name="pageData" id="pageData"/>').val(page);

    // append to the form
    //$('#searchMe').append($inputExtra);

    $.ajax({
        url: 'tproyectos/ps_search.php',
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

                    var table = $('#example').DataTable({
                        "columnDefs": [
                            { "visible": false, "targets": 2 }
                        ],
                        "order": [[ 2, 'asc' ]],
                        "displayLength": 25,
                        "paging":   false,
                        "info":     false,
                        "drawCallback": function ( settings ) {
                            var api = this.api();
                            var rows = api.rows( {page:'current'} ).nodes();
                            var last=null;


                        }
                    } );

                    // Order by the grouping
                    $('#example tbody').on( 'click', 'tr.group', function () {
                        var currentOrder = table.order()[0];
                        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
                            table.order( [ 2, 'desc' ] ).draw();
                        }
                        else {
                            table.order( [ 2, 'asc' ] ).draw();
                        }
                    } );

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

function setIdProyecto(id)
{
    //alert(id);
    document.getElementById("idP").value = id;
}

function detailMe(idProyecto){

    var values = {
        'idProyecto'       : idProyecto,
        'otra'        : "Hola",
    };

    $.ajax({
        url: 'tproyectos/ps_searchDetail.php',
        type: 'POST',
        encoding:"UTF-8",
        data: values,
        dataType: 'json'
    })

        .done(function(data){

            $(".preloader").fadeIn();
            setTimeout(function(){

                if ( data.status==='success' ) {
                    $(".preloader").fadeOut();
                    //alert(data.message);
                    $('#resModal').html(data.result);

                } else {
                    $(".preloader").fadeOut();
                    //$('#resDiv').html(data.result);
                    //alert(data.message);
                }

            },3000);
        })
        .fail(function(){
            alert('An unknown error occoured, Please try again Later...');
        });

}


function setStatus(idProyecto,valor)
{
    var values = {
        'idProyecto'       : idProyecto,
        'valor'            : valor,
    };

    $.ajax({
        url: 'tproyectos/ps_setStatus.php',
        type: 'POST',
        encoding:"UTF-8",
        data: values,
        dataType: 'json'
    })

        .done(function(data){

            $(".preloader").fadeIn();
            setTimeout(function(){

                if ( data.status==='success' ) {
                    $(".preloader").fadeOut();
                    $('#modalUpd').modal('hide');
                    $('#errorDiv').slideDown('fast', function(){
                    $('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
                    }).delay(3000).slideUp('fast');
                    // actualizo los datos
                       paginateMe(1);
                } else {
                    $(".preloader").fadeOut();
                    $('#errorDiv').slideDown('fast', function(){
                        $('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
                        //$('#resDiv').html(data.result);
                    }).delay(3000).slideUp('fast');
                }

            },3000);
        })
        .fail(function(){
            alert('An unknown error occoured, Please try again Later...');
        });

    //alert("id:"+idProyecto+"valor:"+valor);
}

