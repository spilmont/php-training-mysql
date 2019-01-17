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

$idu=$_GET['id'];
$idu = filter_var($idu,FILTER_SANITIZE_NUMBER_INT);

function effacer(){
    global $conn;
    global $idu;


    $sql = "delete from hiking where id = $idu ";

    $conn->query($sql);

    echo "id a bien etait supprimer";

    header("Location:read.php");


}
effacer();

?>




