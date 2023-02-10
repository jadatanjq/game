<?php

session_start();
unset($_SESSION['username']);
if (isset($_SESSION['username'])){
    header('location: battleship.php');
    exit;
}


?>

<!doctype html>
<html>
    <head>
        <title> password reset</title>
        </head>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<?php require_once 'design/style.php'; 
require_once 'design/sidebar.php';?>
    <h3><a href = 'home.php'><img src = 'ship.png' width = '100' height = '100'></a></h3>
    <h1> Reset your password </h1>

    <!-- </br></br></br></br>
    <p><a href = 'home.php'>Back to homepage?</a></p> -->

    </body>

</html>
