$(document).ready(function () {
    // racine = '/onispa/public/';

    // Ajout du CSRF Token pour les requettes ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Customzing dataTable ajax errors
    $.fn.dataTable.ext.errMode = function (settings, helpPage, message) {
        console.log(message);
        $.alert("Une erreur est survenue lors du chargement du contenu veuillez réessayer ou actualiser la page!");
    };

    loading_content = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>';

    resetInit();
});

// Ouvrir dans le Main Modal
function openInModal(link, aftersave = null) {
    $.ajax({
        type: 'get',
        url: link,
        success: function (data) {
            $("#main-modal .modal-header-body").html(data);
            $("#main-modal").modal();
            resetInit();
            if (aftersave)
                aftersave();
        },
        error: function () {
            $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
        }
    });
}

// Get the content from Ajax and show it in a div
function getTheContent(link, container, element = null) {
    if (element) {
        $('.tr-list').css('background-color', '#fff');
        $(element).css('background-color', '#eee');
    }
    $(container).html(loading_content);
    $.ajax({
        type: 'get',
        url: racine + link,
        success: function (data) {
            $(container).html(data);
            resetInit();
        },
        error: function () {
            $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
        }
    });
}

// Init of DataTables
function setDataTable(element) {
    // Data tables to load
    if (!$.fn.dataTable.isDataTable(element) && $(element).length) {
        var colonnes = [];
        var index = [];
        var target;
        var search;
        if (typeof $(element).attr("index") !== 'undefined') {
            var lists = $(element).attr("index").split(',');
            for (var i = 0; i < lists.length; i++) {
                index.push(parseInt(lists[i]));
            }
        } else {
            index.push(-1);
        }
        var nbr = $(element).attr("nbr");
        if (typeof $(element).attr("nbr") !== 'undefined') {
            nbr = $(element).attr("nbr");
        } else {
            nbr = 10;
        }
        if (typeof $(element).attr("search") !== 'undefined') {
            search = false;
        } else {
            search = true;
        }
        var lists = $(element).attr("colonnes").split(',');
        for (var i = 0; i < lists.length; i++) {
            colonnes.push({
                'data': lists[i],
                'name': lists[i]
            });
        }
        target = 'targets:' + index;
        oTable = $(element).DataTable({
            oLanguage: {
                sUrl: racine + "vendor/datatables/datatable-fr.json",
            },
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "orderCellsTop": true,
            "bDestroy": true,
            "cache": false,
            "searching": search,
            "pageLength": nbr,
            "iDisplayLength": nbr,
            //"ordering": false,
            "order": [
                [0, "asc"]
            ],
            "columnDefs": [{
                orderable: false,
                targets: index
            },
                {
                    searchable: false,
                    targets: index
                }
            ],
            "ajax": $(element).attr("link"),
            "columns": colonnes,
            "drawCallback": function () {
                // init tooltips
                if ($(".status-check").length) {
                    $('.status-check').bootstrapToggle({
                        on: 'Présent',
                        off: 'Absent'
                    });
                }
                ;
                // init tooltips
                $('[data-toggle="tooltip"]').tooltip();
                $('.delete').confirm({
                    title: 'Confirmation',
                    content: 'Êtes-vous sûr de vouloir supprimer cet élément?',
                    buttons: {
                        ok: {
                            text: 'Oui',
                            btnClass: 'btn-default',
                            action: function () {
                                $.ajax({
                                    type: 'GET',
                                    url: this.$target.attr('href'),
                                    success: function (data) {
                                        if (data.success == "true") {
                                            $('#datatableshow').DataTable().ajax.reload()
                                            $.alert(data.msg, 'Elément supprimé');
                                        } else $.alert(data.msg, 'Erreur');
                                    },
                                    error: function () {
                                        $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
                                    }
                                });
                            }
                        },
                        cancel: {
                            text: 'Non',
                            btnClass: 'btn-default'
                        }
                    }
                });
                resetInit();
            }
        })
    }
}

function openObjectModal(id, lemodule, tab = 1, largeModal = false) {
    $.ajax({
        type: 'get',
        url: racine + lemodule + '/get/' + id,
        success: function (data) {
            if (largeModal) $("#main-modal .modal-dialog").addClass("modal-" + largeModal);
            $("#main-modal .modal-header-body").html(data);
            $("#main-modal").modal();
            setMainTabs(tab);

            $("#datatableshow").attr('link');
            $('#datatableshow').DataTable().ajax.url($("#datatableshow").attr('link') + "/" + id).load();
        },
        error: function () {
            $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
        }
    });
}

function openFormAddInModal(lemodule, id = false) {
    if (id != false)
        url = racine + lemodule + '/add/' + id;
    else
        url = racine + lemodule + '/add/';

    $.ajax({
        type: 'get',
        url: url,
        success: function (data) {
            $("#add-modal .modal-header-body").html(data);
            $("#add-modal").modal();
            resetInit();
        },
        error: function () {
            $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
        }
    });
}

function setMainTabs(tab = 1) {
    $('.main-tabs a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        $($(e.target).attr("href")).empty();
        getTheContent($(e.target).attr("link"), $(e.target).attr("href"));
    });
    if (tab == 1) {
        let link = $('#link1').attr("link");
        getTheContent(link, '#tab1');
    } else
        $('#link' + tab).trigger('click');
}

function addObject(element, lemodule,datatable="#datatableshow") {
    saveform(element, function (id) {
        $(datatable).DataTable().ajax.reload();
        $(element).attr('disabled', 'disabled');
        setTimeout(function () {
            $('#add-modal').modal('toggle');
            openObjectModal(id, lemodule);
        }, 1500);
    });
}

function saveform(element, aftersave = null) {
    var container = $(element).attr('container');

    $('#' + container + ' #form-errors').hide();
    $(element).attr('disabled', 'disabled');
    $('#' + container + ' .main-icon').hide();
    $('#' + container + ' .spinner-border').show();
    var data = $('#' + container + ' form').serialize();
    $.ajax({
        type: $('#' + container + ' form').attr("method"),
        url: $('#' + container + ' form').attr("action"),
        data: data,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            //$('.datatableshow').DataTable().ajax.reload();
            $('#' + container + ' .spinner-border').hide();
            $('#' + container + ' .answers-well-saved').show();
            $(element).removeAttr('disabled');
            setTimeout(function () {
                $('#' + container + ' .answers-well-saved').hide();
                $('#' + container + ' .main-icon').show();
            }, 3500);
            if (aftersave) {
                aftersave(data);
            }
        },
        error: function (data) {
            if (data.status === 422) {
                var errors = data.responseJSON;
                errorsHtml = '<ul class="list-group">';
                var erreurs = (errors.errors) ? errors.errors : errors;
                $.each(erreurs, function (key, value) {
                    errorsHtml += '<li class="list-group-item list-group-item-danger">' + value[0] + '</li>';
                });
                errorsHtml += '</ul>';
                $('#' + container + ' #form-errors').show().html(errorsHtml);
            } else {
                alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
            }
            $('#' + container + ' .spinner-border').hide();
            $('#' + container + ' .main-icon').show();
            $(element).removeAttr('disabled');
        }
    });
}

function confirmAction(link, text, aftersave = null) {
    $.confirm({
        title: 'Confirmation',
        content: text,
        buttons: {
            confirm: function () {
                $.ajax({
                    type: 'GET',
                    url: link,
                    success: function (data) {
                        if (data.success == "true") {
                            $('#datatableshow').DataTable().ajax.reload()
                            $.dialog(data.msg, 'Confirmation');
                            if (aftersave) {
                                aftersave(data);
                            }
                        } else $.dialog(data.msg, 'Erreur');
                    },
                    error: function () {
                        $.dialog("Une erreur est survenue veuillez réessayer ou actualiser la page!");
                    }
                });
            },
            close: function () {
            }
        }
    });
}

// updating a group des elements
function updateGroupeElements(element = null) {
    $('[data-toggle="tooltip"]').tooltip('dispose');
    var questions = $(".group-elements").sortable('toArray');
    var childscount = $(".group-elements li").length;
    var idgroup = $(".group-elements").attr('idgroup');
    var datatble = $(".group-elements").attr('datatable-source');
    var lien = $(".group-elements").attr('lien');
    if (element) {
        if ($(element).hasClass("close")) {
            questions = jQuery.grep(questions, function (value) {
                return value != $(element).parent().attr('id');
            });
            $(element).html('<i style="font-size:13px" class="fa fa-refresh fa-spin fa-fw"></i>');
        } else {
            $(element).children('i').removeClass('fa-arrow-right').addClass('fa-refresh fa-spin');
            questions.push($(element).attr('idelt'));
        }
    }
    if (questions.length)
        var qsts = questions.join();
    else
        var qsts = 0;
    var link = racine + lien + "/" + qsts + '/' + idgroup;
    $.ajax({
        type: 'GET',
        url: link,
        success: function (data) {
            if (element) {
                if ($(element).hasClass("close"))
                    $(element).parent().remove();
                else {
                    var idelt = $(element).attr('idelt');
                    var libelle = $(element).attr('libelle');
                    $(element).parents('tr').remove();
                    $(".group-elements").append('<li class="list-group-item" id="' + idelt + '">' + libelle + '<button type="button" idelt="' + idelt + '" class="close" aria-hidden="true" onclick="updateGroupeElements(this)">&times;</button></li>');
                }
                if ($('.btn-drftval').length) {
                    if (qsts.length > 0)
                        $('.btn-drftval').show();
                    else
                        $('.btn-drftval').hide();
                }
            }
            $(datatble).DataTable().ajax.reload();
        },
        error: function () {
            if (element) {
                if ($(element).hasClass("close"))
                    $(element).html('&times;');
                else {
                    $(element).children('i').removeClass('fa-refresh fa-spin').addClass('fa-arrow-right');
                }
            }
            $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
        }
    });
}

function resetInit() {

    // init du select picker
    $('.selectpicker').selectpicker({
        size: 10
    });

    //Grouping
    $(".group-elements").sortable({
        axis: 'y',
        update: function (event, ui) {
            updateGroupeElements();
        }
    });

    // Datatables to load General
    if ($('#datatableshow').length) setDataTable('#datatableshow');
    if ($('.datatableshow').length) setDataTable('.datatableshow');
    // Datatables des onglets
    for (let i = 1; i < 6; i++) {
        if ($('.datatableshow' + i).length) setDataTable('.datatableshow' + i);
    }

    // init tooltips
    $('[data-toggle="tooltip"]').tooltip();


    // MAKE SAVE BTN LIKE BTN SAVE LOADING AND STUFF


    //bouton enregister ajax
    $(".btn-save").on('click', function () {
        var container = $(this).attr('container');
        $('#' + container + ' #form-errors').hide();
        var element = $(this);
        $(element).attr('disabled', 'disabled');
        $('#' + container + ' .main-icon').hide();
        $('#' + container + ' .spinner-border').show();
        var data = $('#' + container + ' form').serialize();
        $.ajax({
            type: $('#' + container + ' form').attr("method"),
            url: $('#' + container + ' form').attr("action"),
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('.datatableshow').DataTable().ajax.reload();
                $('#' + container + ' .spinner-border').hide();
                $('#' + container + ' .answers-well-saved').show();
                $(element).removeAttr('disabled');
                setTimeout(function () {
                    $('#' + container + ' .answers-well-saved').hide();
                    $('#' + container + ' .main-icon').show();
                }, 3500);
            },
            error: function (data) {
                if (data.status === 422) {
                    var errors = data.responseJSON;
                    // console.log(errors);
                    errorsHtml = '<ul class="list-group">';
                    var erreurs = (errors.errors) ? errors.errors : errors;
                    $.each(erreurs, function (key, value) {
                        errorsHtml += '<li class="list-group-item list-group-item-danger">' + value[0] + '</li>';
                    });
                    errorsHtml += '</ul>';
                    $('#' + container + ' #form-errors').show().html(errorsHtml);
                } else {
                    alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
                }
                $('#' + container + ' .spinner-border').hide();
                $('#' + container + ' .main-icon').show();
                $(element).removeAttr('disabled');
            }
        });
    });
}

$('#main-modal').on('hidden.bs.modal', function () {
    if ($('.datatableshow').length) {
        $('.datatableshow').DataTable().ajax.reload();
    } else if ($('#datatableshow').length) {
        $('#datatableshow').DataTable().ajax.reload();
    }
});
