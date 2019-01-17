<?php

session_start();

$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "reunion_island";

$conn = new mysqli($serverName,$userName,$password);

if($conn->connect_error){
    die("connted failed : ".$conn->connect_error);
}else{
    $conn->select_db($dbname);
    echo "";
}



$mail= (isset($_POST['email'])?$_POST['email']:null);
$mail= filter_var($mail,FILTER_SANITIZE_EMAIL);
$mailV= (isset($_POST['emailV'])?$_POST['emailV']:null);
$mailV= filter_var($mailV,FILTER_SANITIZE_EMAIL);
$mdp= (isset($_POST['mdp'])?$_POST['mdp']:null);
$mdp= filter_var($mdp,FILTER_SANITIZE_STRING);
$mdpV= (isset($_POST['mdpV'])?$_POST['mdpV']:null);
$mdpV= filter_var($mdp,FILTER_SANITIZE_STRING);
$pseudo= (isset($_POST['pseudo'])?$_POST['pseudo']:null);
$pseudo= filter_var($pseudo,FILTER_SANITIZE_STRING);
$nom= (isset($_POST['nom'])?$_POST['nom']:null);
$nom= filter_var($nom,FILTER_SANITIZE_STRING);
$prenom= (isset($_POST['prenom'])?$_POST['prenom']:null);
$prenom= filter_var($prenom,FILTER_SANITIZE_STRING);


if($mail==$mailV && $mdp == $mdpV){
$sql = "insert into `user` values ('','$pseudo','$mail','$nom','$prenom','$nom','$password')";
$conn->query($sql);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<form action="inscription.php" method="post">
    <label for="pseudo"> nom d'utilisateur </label><input type="text" class="formulaire" id="pseudo" name="pseudo"><br>
    <label for="nom"> nom </label><input type="text" id="nom" class="formulaire" name="nom"><br>
    <label for="prenom"> prenom </label><input type="text" id="prenom" class="formulaire" name="prenom"><br>
    <label for="email"> email </label><input type="email" id="email" class="formulaire" name="email"><br>
    <label for="emailV">reentrer l'email</label><input type="email" id="emailV" class="formulaire" name="emailV"><br>
    <label for="mdp">mot de passe</label><input type="password" id="mdp" class="formulaire" name="mdp"><br>
    <label for="mdpV">reentrer mot de passe</label><input type="password" id="mdpV" class="formulaire" name="mdpV"><br>
    <input type="submit" name="enregistrer" id="enregistrer" value="enregistrer">
</form>
</body>
</html>