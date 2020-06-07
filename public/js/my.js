$(document).ready(function () {
    // racine = '/onispa/public/';

    // Ajout du CSRF Token pour les requettes ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
    //begin referentiesl
    function addnew(){
        // $( '#addNewModal #form-errors' ).hide();
        var element = $(this);
        // $(element).attr('disabled','disabled');
        // $("#addNewModal .form-loading").show();
        $('#addNewModal .main-icon').hide();
        $('#addNewModal .spinner-border').show();
        var data = $('#addNewModal form').serialize();
        $.ajax({
            type: $('#addNewModal form').attr("method"),
            url: $('#addNewModal form').attr("action"),
            data: data,
            dataType: 'json',
            success: function(data){
                window.location.href = data;
            },
            error: function(data){
                if( data.status === 422 ) {
                    var errors = data.responseJSON;
                    console.log(errors);
                    errorsHtml = '<ul>';
                    var erreurs = (errors.errors) ? errors.errors : errors; $.each( erreurs, function( key, value ) {
                    errorsHtml += '<li class="list-group-item list-group-item-danger">' + value[0] + '</li>';
                        
                    });
                    errorsHtml += '</ul>';
                    $( '#addNewModal #form-errors' ).show().html( errorsHtml );
                } else {
                    $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
                }
                // $("#addNewModal .form-loading").hide();
                $('#addNewModal .spinner-border').hide();
                $('#addNewModal .main-icon').show();
                // $(element).removeAttr('disabled');
            }
            
        });
    }
    function openEditRefModal(array)
    {
        var tableau=array.split(",");
        var ref=tableau[0];
        var id=tableau[1];
        // alert(ref);
        // alert(id);
       $.ajax({
           type: 'get',
           url: racine+'ref/edit/'+ref+'/'+id,
           // alert(url);
           success: function (data) {
            // alert(data);
            $("#main-modal .modal-header-body").html(data);
            var title_modif =$('#title_modif').val();
            $(".title_modif").html(title_modif);
            var libelleref =$('#libelleref').val();
            $(".libelleref").html(libelleref);
            $("#main-modal").modal();
            // initmain();

            
           },
           error: function () { $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!"); }
       });
    }
    //end referentiel 
    //changer le lieu d'employeur
    function changeLieu(){
        if ($('.checkLieu').is(':checked')){
            $( '.divPays' ).hide();
            $( '.divRIM' ).show();
        }
        else {
            $( '.divPays' ).show();
            $( '.divRIM' ).hide();
        }
    }

    function filterFormation()
    {
        type = $("#type").val();
        centre = $("#centre").val();
        domaine = $("#domaine").val();
        langue = $("#langue").val();
        $('#datatableshow').DataTable().ajax.url(racine + "formations/getDT/"+ type + '/'  + centre  + '/'  + domaine  + '/'  + langue  + '/all').load();
    }

    function filterEmployeur()
    {
        secteur = $("#secteur").val();
        $('#datatableshow').DataTable().ajax.url(racine + "employeurs/getDT/"+ secteur + '/'  + centre  + '/'  + domaine  + '/'  + langue  + '/all').load();
    }

    