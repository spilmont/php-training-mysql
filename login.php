<?php


$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "reunion_island";

$conn = new mysqli($serverName, $userName, $password);

if ($conn->connect_error) {
    die("connect failed: " . $conn->connect_error);
} else {
    $conn->select_db($dbname);
}


$username = (isset($_POST['username']) ? $_POST['username'] : null);
$username = filter_var($username, FILTER_SANITIZE_STRING);
$mdp = (isset($_POST['password']) ? $_POST['password'] : null);
$mdp = filter_var($mdp, FILTER_SANITIZE_STRING);

if($mdp != null){
    $mdp=sha1($mdp);
}
echo $mdp;


$sql = "select id,username,password from `user` where '$username'= username and '$mdp'=password ";

$result = $conn->query($sql);


$row = $result->fetch_assoc();


$username = $row['username'];
$mdp = $row['password'];

if (isset($username) && (isset($mdp))) {


    if ($username == $_POST['username'] && $mdp == sha1($_POST['password'])) {
        session_start();

        $_SESSION["username"] = $username;
        $_SESSION["password"] = $mdp;

        header("Location:read.php");


    } elseif (empty($username) && empty($mdp)) {
    } else {
        echo "mots de passe ou nom utilisateur inccorect  ";
    }


}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

<form action="" method="post">
    <div>
        <label for="username">Identifiant</label>
        <input type="text" name="username">
    </div>
    <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password">
    </div>
    <div>
        <input type="submit" value="connexion">
    </div>
</form>
</body>
</html>
