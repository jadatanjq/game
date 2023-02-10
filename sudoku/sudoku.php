<?php

session_start();
spl_autoload_register(
    function($class) {
        require_once "../database/classes/$class.php";
    }
);

$dao = null;
$player = null;

if (isset($_SESSION['username'])){
    //if logged in
    $dao = new PlayerDAO();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $player = $dao -> get($username,$password);

}


?>

<!doctype html>
<html>
    <head>
        <title> sudoku </title>
        </head>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<?php require_once '../design/style.php'; 
require_once '../design/sidebar.php';?>

<h3><a href = '../sudokuhome.php'><img src = '../images/sudoku.png' width = '100' height = '100'></a></h3>
<h1> sudoku game </h1>

</br>
<h3> coming soon! </h3>

<!-- <table>
    <tr>
        <th> -->

</br></br>


<!-- <h3><p><a href = 'gameprocess.php'>New game?</a></p></h3> -->


</body>
</html>