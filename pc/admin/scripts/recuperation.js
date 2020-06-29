
$(document).on('click', '#addRecu', function () {
    
    var nbrJ = $("#nbrJ").val();
    var operRecu = $("#operRecu").val();
    var etatRecu = $("#etatRecu").val();
    var btn = $("#addRecu").html();
    var id = $("#idRecup").val();
    console.log($("#addRecu").html());
    $.ajax({
        url: "../../api/addRecup.php",
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        data: {btn: btn,id : id, nbrJ: nbrJ, operRecu: operRecu, etatRecu: etatRecu},
        success: function (data, textStatus, jqXHR) {
            //console.log(data);
            //displayRecup(data);
            if (btn === "Modifier") {
                swal("Bien Modifier!", "", "success");
                location.reload();
            } else if (btn === "Ajouter") {
                swal("Bien Ajouté!", "", "success");
                location.reload();
            }
            $("#addRecu").html("Ajouter");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus+" "+ errorThrown+" "+jqXHR);
        }
    });
});

$(document).on('click', '.deleteR', function () {

    var id = $(this).attr("data");

    swal({
        title: "Voulez-vous vraiment le supprimer?", text: "Une fois supprimer,vous pouvez pas le recuperer!",
        icon: "warning", buttons: true, dangerMode: true
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "../../api/deleteRecup.php",
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                data: {id: id},
                success: function (data) {
                    //console.log(data);
                    //displayRecup(data);
                    location.reload();
                },
                error: function (errorThrown) {
                    console.log("erreur");
                }
            });
        }
    });

}); 

$(document).on('click', '.updateR', function () {
    
    var id = $(this).attr("data");
    $.ajax({
        url: '../../api/findByIdRecup.php',
        type: 'POST',
        cache: false,
        dataType: 'JSON',
        data: {id:id},
        success: function (data, textStatus, jqXHR) {
                console.log(data);
                $("#operRecu").val(data['operation']);
                $("#etatRecu").val(data['etat']);
                $("#nbrJ").val(data['nbrJours']);
                $("#idRecup").val(data['id']);
                $("#addRecu").html("Modifier");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus+" "+ errorThrown+" "+jqXHR);
        }
    });

});

function displayRecup(data) {
    var row ='<table width="100%" class="table table-striped table-bordered table-hover recupTable" id="dataTables-example">';
    row += '<thead><tr><th>Nbr Jours</th><th>Operation</th><th>Etat</th><th>Modifier</th><th>Supprimer</th></tr></thead>';
    row += '<tbody>';
    for (var i = 0; i < data.length; i++) {
        if(data[i].etat === "0"){
            row += '<tr class="odd gradeX danger">';
            row += '<td>'+data[i].nbrJours+'</td><td>'+data[i].oper+'</td><td>Non Validé</td>';
            row += '<td><button class="btn btn-info updateR" id="updateR" data="'+data[i].id+'">Modifier</button></td>';
            row += '<td><button class="btn btn-warning deleteR" id="deleteR" data="'+data[i].id+'">Supprimer</button></td>';
            row += '</tr>';
        }else{ 
            row += '<tr class="odd gradeX success">';
            row += '<td>'+data[i].nbrJours+'</td><td>'+data[i].oper+'</td><td>Validé</td>';
            row += '<td><button class="btn btn-info updateR" id="updateR" data="'+data[i].id+'">Modifier</button></td>';
            row += '<td><button class="btn btn-warning deleteR" id="deleteR" data="'+data[i].id+'">Supprimer</button></td>';
            row += '</tr>';
         } 
    } 
    row += '</tbody></table>';
    $(".recupTable").remove();
    $("#recupPanel").append(row);
    initRecup();
}

function initRecup() {
    $("#etatRecu").val(3);
    $("#nbrJ").val("");
    $("#operRecu").val(0);
}