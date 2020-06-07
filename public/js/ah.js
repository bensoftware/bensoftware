function selectProfilUser(element) {
    var id = $(element).val();
    $.ajax({
        type: 'get',
        url: racine + 'profilsAcces/selectProfilUser/' + id ,
        success: function (admin_etab) {
            if(admin_etab==1){
                $('.etablissements-container').show();
                $('.is_admin_etab').val("1");
            }
            else{
                $('.etablissements-container').hide();
                $('.is_admin_etab').val("0");
            }
            // $('.selectpicker').selectpicker({
            //     size: 4
            // });
        },
        error: function () { $.alert("Une erreur est survenue veuillez rÃ©essayer ou actualiser la page!"); }
    });
}

// Ouvrire le modal d'ajout de profile a un user
function addProfileToUser(id) {
    $.ajax({
        type: 'get',
        url: racine + 'admin/users/addProfileToUser/' + id,
        success: function (data) {
            $("#second-modal .modal-header-body").html(data);
            $("#second-modal").modal();
            resetInit();
        },
        error: function () {
            $.alert("Une erreur est survenue veuillez rÃ©essayer ou actualiser la page!");
        }
    });
}
//enregister un profil pour un user ajax
function saveProfileUser(id, element) {
    saveform(element, function(id){
        //$(element).attr('disabled','disabled');
        setTimeout(function () {
            $('#second-modal').modal('toggle');
            getTheContent('admin/users/getTab/' + id + '/2' , '#tab2');
        }, 1000);
    });
}

function deleteProfileFromUser(link, text) {
    confirmAction(link, text, function(id){
        getTheContent($('#link2').attr("link"), '#tab2');
    });
}