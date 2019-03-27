<?php
require_once './Config.php';
$loginURL = $gC->createAuthUrl();
if (isset($_SESSION["access_token"])) {
    $email = $_SESSION["email"];
} else { $email = "Anonyme";}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/index.css">
    </head>

<body>

    <div class="container">
        <div class="container flex-container">
            <div class="row title">
                <div class="col-12"><h1>Ma TO DO List</h1></div>
            </div>
            <div class="row">
                <div class="col-8">
                    <h4><?php echo $email; ?></h4>
                </div>
                <div class="col-4"><button class="btn btn-primary"
                        onclick="window.location= '<?php echo $loginURL ?>'">Connexion avec Google</button>
                <button class="btn btn-primary"
                        onclick="window.location='logout.php'">Logout</button></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form id="formAjouter">
                        <div class="form-group">
                            <input type="hidden" name="action" value="add">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>
                                <div class="col-4">
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <input type="submit" class="ajt btn btn-primary" id="ajouter" value="Ajouter">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="supAlert" class="alert alert-danger hide ">Vous devez vous connecter pour réaliser cette action! </div> 
            <div class="row list">
                <table id="tabla" class="table">
                    <tr>
                        <th scope="col">Numéro</th>
                        <th scope="col">Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Action</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>



    <div style="display:none" id="modifierData">
        <div class="form-group">
            <form id="formModifier">
                <input type="hidden" name="action" value="update">
                <input type="hidden" id="idMod" name="id" value="">
                <label for="date" >Date: </label>
                <input type="date" name="date" id="dateMod">
                <label for="name" >Tâche: </label>
                <input type="text" name="name" id="nameMod">
                <input type="submit" id="modifier" value="Modifier">
            </form>
        </div>
    </div>
    <div style="display:none" id="ajouterPersonne">
        <form id="personne">
            <input type="hidden" name="action" value="addPerson">
            <input type="hidden" id="idTache" name="id" value="">
            <label for="nom" >Nom: </label>
            <input type="text" name="nom" id="nomPer">
            <input type="submit" id="btnAjouterPersonne" value="Ajouter">
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
    <script src="JS/index.js"></script>
</body>

</html>