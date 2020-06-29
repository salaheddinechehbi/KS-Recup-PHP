



$(document).on('click', '#addOper', function () {
    
    var libelle = $("#libelle").val();
    var nbrJ = $("#nbrJ").val();
    var ville = $("#ville").val();
    var adresse = $("#adresse").val();
    var dateDebut = $("#dateDebut").val();
    var dateFin = $("#dateFin").val();
    var btn = $("#addOper").html();
    var id = $("#idOperation").val();
    console.log($("#addOper").html());
    
    $.ajax({
        url: "../../api/addOper.php",
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        data: {btn: btn, id:id, nbrJ:nbrJ, dateDebut:dateDebut, dateFin:dateFin, adresse:adresse, ville:ville, libelle:libelle},
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

$(document).on('click', '.deleteO', function () {

    var id = $(this).attr("data");

    swal({
        title: "Voulez-vous vraiment le supprimer?", text: "Une fois supprimer,vous pouvez pas le recuperer!",
        icon: "warning", buttons: true, dangerMode: true
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "../../api/deleteOper.php",
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

$(document).on('click', '.updateO', function () {
    
    var id = $(this).attr("data");
    $.ajax({
        url: '../../api/findByIdOper.php',
        type: 'POST',
        cache: false,
        dataType: 'JSON',
        data: {id:id},
        success: function (data, textStatus, jqXHR) {
                console.log(data);
//                var sd = (moment(new Date(data.dateDebut)).format('L')).split("/");
//                var dd = sd[2] + "-" + sd[0] + "-" + sd[1];
//                var sd2 = (moment(new Date(data.dateFin)).format('L')).split("/");
//                var df = sd2[2] + "-" + sd2[0] + "-" + sd2[1];
                $("#adresse").val(data['adresse']);
                $("#libelle").val(data['libelle']);
                $("#ville").val(data['ville']);
                $("#dateDebut").val(data['dateDebut']);
                $("#dateFin").val(data['dateFin']);
                $("#nbrJ").val(data['nbrJours']);
                $("#idOperation").val(data['id']);
                $("#addOper").html("Modifier");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus+" "+ errorThrown+" "+jqXHR);
        }
    });

});

function displayRecup(data) {
    var row ='<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">';
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
    $("#operTable").empty();
    $("#operTable").html(row);
    //$("#operTable").dataTable();
    initRecup();
}

function initRecup() {
    $("#adresse").val("");
    $("#libelle").val("");
    $("#ville").val("");
    $("#dateDebut").val("");
    $("#dateFin").val("");
    $("#nbrJ").val("");
    $("#idOperation").val("");
}