function get_etabs()
{
    id_pays = $("#pays_etude").val();
    if(id_pays != 'all')
    {
        $.ajax({
            type: 'get',
            url: racine+'DE/etudes/pays_etabs/'+id_pays,
            cache: false,
            success: function(data)
            {
                $("#etabs_pays").empty();
                $('#etabs_pays').html(data);
                resetInit();

            },
            error: function () {

                //loading_hide();
                //$meg="Un problème est survenu. veuillez réessayer plus tard";
                //$.alert("Un problème est survenu. veuillez réessayer plus tard");
            }
        });

    }
    else{
        $("#etabs_pays").html('');
    }
}
