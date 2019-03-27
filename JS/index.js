
$(function () {
    $(".iframe").fancybox({
        transitionIn: "elastic",
        speedIn: 1000
    });
    $("a#inline").fancybox({
        'hideOnContentClick': true
    });

   afficher();
    
    $(document).on("click", '.sup', supprimer);
    $(document).on("click", '.mod', modifier0);
    $(document).on("click", '.fas', ajouterPersonne0);
    $(document).on("submit", '#formAjouter', ajouter);
    $(document).on("submit", '#formModifier', modifier); 
    $(document).on("submit", '#ajouterPersonne', ajouterPersonne); 
    $(document).on("click", '.icons', verifierSession); 

});

function afficher(){
    $.getJSON("/WebServicesCalais/Requetes.php", function (reponse) {
        
        $.each(reponse, function (i, value) {
            let name;
            if(value.name_personne==null){name=""}else{name=value.name_personne}
            $(".table").append("<tr id=" + value.id + " class='task' ><td scope='col'>" + value.id+ "</td><td class='tdDate' scope='col'>" + value.date + "</td>\n\
            <td class='tdName' scope='col'>" + value.name + "</td><td class='tdCharge' scope='col'>"+name+"</td><td class'actions' >\n\
            <a class='icons' data-fancybox data-src='#ajouterPersonne' href='javascript:;'><i class='fas fa-user-edit'></i></a>\n\
            <a  class='icons' data-fancybox data-src='#modifierData' href='javascript:;'><i class='mod fas fa-pencil-alt'></i></a>\n\
            <i id='a' class='icons sup fas fa-trash-alt'></i></td></tr>");
        });
    });
}
function ajouter(e) {
    e.preventDefault();
    var date = $("#date").val();
    var name = $("#name").val();

    $.ajax({
        data: /*{"action": "add", "date": date, "name": name}*/ $("#formAjouter").serialize(),
        url: '/WebServicesCalais/Requetes.php',
        type: 'GET',
        success: function () {
            window.location.href="index.php";
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function modifier0() {
    var name= $(this).parent().parent().siblings(".tdName").text();
    var date= $(this).parentsUntil(".task").siblings(".tdDate").text();
    var id = $(this).parentsUntil(".task").parent().attr("id");
    $("#nameMod").val(name);
    $("#dateMod").val(date);
    $("#idMod").val(id);
   
}

function modifier(e){
    e.preventDefault();
    $.ajax({
        data: $("#formModifier").serialize(),
        url: '/WebServicesCalais/Requetes.php',
        type: 'GET',
        success: function (reponse) {
            location.href="index.php";
        },
        error: function () {
        }
    });
}

function supprimer(e) {
    e.preventDefault();
    var id = $(this).parentsUntil(".task").parent().attr("id");
    var c=  confirm("Vous êtes sûr de vouloir supprimer cette tâche?");
    if(c){
    $.ajax({
        data: {"action": "remove", "id": id},
        url: '/WebServicesCalais/Requetes.php',
        type: 'GET',
        success: function (reponse) {
            location.href="index.php";
        },
        error: function () {
        }
    });}
}

function ajouterPersonne0(){
    var id = $(this).parentsUntil(".task").parent().attr("id");
    $("#idTache").val(id);    
}

function ajouterPersonne(e){
    e.preventDefault();
    $.ajax({
        data: $("#personne").serialize(),
        url: '/WebServicesCalais/Requetes.php',
        type: 'GET',
        success: function (reponse) {
            location.href="index.php";
        },
        error: function () {
        }
    });

function verifierSession(){
    $.ajax({
        url: '/WebServicesCalais/verifierSession.php',
        type: 'GET',
        success: function (reponse) {
            if(reponse=="not ok"){
                $("#supAlert").removeClass("hidden");
            }
        },
        error: function () {
        }
    });
}
}
