<?php

session_start();


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

$sql ="select * from hiking";

$result = $conn->query($sql);



?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
  <?php
  echo $_SESSION['username'];
  echo"test";
  ?>
      <h1>Les Ramdonées de l'île de la reunion</h1>
    <a href="create.php">creer une nouvelle randonée</a>
      <a href="logout.php">deconnection</a>
    <table>
        <tr>
            <th>Nom des ramdonnées</th>
            <th>Modifier</th>
            <th>suprimmer</th>
            <th>Difficulte</th>
            <th>Durée</th>
            <th>Distance</th>
            <th>Deniveler</th>
        </tr>
        <?php


        while($donnees = $result->fetch_assoc()) {


            $idU = $donnees["id"];

            ?>
            <tr>
                <td><?php echo $donnees['name']; ?></td>
                <td ><a class="supp" href="update.php?id=<?= $idU ?>">modifier</a></td>
                <td ><a class="supp"  href="delete.php?id=<?= $idU ?>">suprimer</a></td>
                <td><?php echo $donnees['difficulty']; ?></td>
                <td><?php echo $donnees['distance']; ?></td>
                <td><?php echo $donnees['duration']; ?></td>
                <td><?php echo $donnees['height_difference']; ?></td>

            </tr>
            <?php
        }
        ?>
    </table>
  </body>
</html>

