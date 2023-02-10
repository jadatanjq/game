<?php

session_start();
spl_autoload_register(
    function($class) {
        require_once "database/classes/$class.php";
    }
);
$msg = '';


if (isset($_SESSION['guest'])){
    $msg = "<h3>
    <table align = 'center'>
        <tr>
            <th> Rules of the game: </th>
        </tr>

        <tr>
            <th> You have 5 chances to find the ship! </th>
        </tr>

        <tr>
            <th><p><a href = 'battleship/gameprocess.php'>Start Game</a></p></th>
        </tr>

    </table>
    </h3>
    <p><a href = 'account/login.php'>Login as User?</a></p> ";
}

if (isset($_SESSION['username'])){
    //means logged in 
    
    $dao = new PlayerDAO();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $player = $dao -> get($username,$password);
    $name = $player -> getFullName();

    $msg = "<h3>
    <table align = 'center'>
        <tr>
            <th> Rules of the game: </th>
        </tr>

        <tr>
            <th> You have 5 chances to find the ship! </th>
        </tr>
    </table> </h3>
    <h3>Total number of games played: {$player -> getTotalgames()}</h3>
    <h3>Total number of games won: {$player -> getTotalwins()}</h3></br>";

}
?>

<!doctype html>
<html>

<head>
    <title>battleship homepage</title>
    </head>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<?php require_once 'design/style.php'; 
require_once 'design/sidebar.php';?>

    <h3><a href = 'battleshiphome.php'><img src = 'images/ship.png' width = '100' height = '100'></a></h3>
    <h1> Welcome to Battleship! </h1>

</br>

<?php 

echo $msg;

if (isset($_SESSION['username'])){
    if ($player -> getTotalgames() == 0){
        echo "<p><a href = 'battleship/gameprocess.php'>Start Playing</a></p>";
    }else{
        echo "<p><a href = 'battleship/gameprocess.php'>Keep Playing</a></p>";
    }
    
    echo "<p><a href = 'account/logout.php'>logout</a></p>";
}
?>



</body>

</html>