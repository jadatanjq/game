<?php

session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['ship']);
unset($_SESSION['count']);
unset($_SESSION['game']);
unset($_SESSION['guest']);
unset($_SESSION['name']);
unset($_SESSION['user']);
unset($_SESSION['players']);
unset($_SESSION['turn']);
unset($_SESSION['error']);
unset($_SESSION['error2']);

?>

<!doctype html>
<html>
    <head>
        <title> user logout </title>
        </head>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<?php require_once '../design/style.php'; 
require_once '../design/sidebar.php';?>

<h3><a href = '../home.php'><img src = '../images/game.png' width = '100' height = '100'></a></h3>
<h1>You have successfully logged out!</h1>

</body>

</html>
