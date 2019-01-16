<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "reunion_island";

$conn = new mysqli($serverName,$userName,$password);

if($conn->connect_error){
    die("connect failed: ".$conn->connect_error);
}else{
    $conn->select_db($dbname);
}

$idu = $_GET['id'];
$idu = filter_var($idu, FILTER_SANITIZE_NUMBER_INT);


function autoselect(){

global $conn;
global $idu;

$sql ="select * from hiking where id = '$idu'";

$result = $conn->query($sql);


        while($donnees = $result->fetch_assoc()) {


            ?>


            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>Modifier une randonnée</title>
                <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
            </head>
            <body>
            <a href="read.php">Liste des données</a>
            <h1>Modifier</h1>
            <form action="" method="post">
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?=$donnees['name']?>">
                </div>

                <div>
                    <label for="difficulty">Difficulté</label>
                    <select name="difficulty">
                        <option selected><?= $donnees['difficulty']?></option>
                        <option value="très facile">Très facile</option>
                        <option value="facile">Facile</option>
                        <option value="moyen">Moyen</option>
                        <option value="difficile">Difficile</option>
                        <option value="très difficile">Très difficile</option>
                    </select>
                </div>

                <div>
                    <label for="distance">Distance</label>
                    <input type="text" name="distance" value="<?=$donnees['distance']?>">
                </div>
                <div>
                    <label for="duration">Durée</label>
                    <input type="text" name="duration" value="<?= $donnees['duration']?>">
                </div>
                <div>
                    <label for="height_difference">Dénivelé</label>
                    <input type="text" name="height_difference" value="<?= $donnees['height_difference']?>">
                </div>
                <input type="submit" name="button" value="envoyer">

            </form>
            </body>
            </html>
            <?php
        }

}
autoselect();

function update(){

    global $conn;
    global $idu;
    $name = (isset($_POST['name'])?$_POST['name']: null);
    $name = filter_var($name,FILTER_SANITIZE_STRING);
    $difficulty = (isset($_POST['difficulty'])?$_POST['difficulty']: null);
    $difficulty = filter_var($difficulty,FILTER_SANITIZE_STRING);
    $distance =(isset($_POST['distance'])?$_POST['distance']: null);
    $distance = filter_var($distance,FILTER_SANITIZE_NUMBER_FLOAT);
    $duration = (isset($_POST['duration'])?$_POST['duration']: null);
    $duration= filter_var($duration,FILTER_SANITIZE_STRING);
    $height_difference=(isset($_POST['height_difference'])?$_POST['height_difference']: null);
    $height_difference = filter_var($name,FILTER_SANITIZE_NUMBER_FLOAT);



    $sql = "update hiking  set name='$name', difficulty='$difficulty', distance='$distance',duration ='$duration', height_difference='$height_difference'   where id = '$idu'";

    $conn->query($sql);

    if($name && $difficulty && $duration && $distance && $height_difference == true ){
        ?>
<div class="mod">les moddiffication on été envoyées</div>
        <?php
    }
}
update();