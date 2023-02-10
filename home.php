<?php

session_start();
spl_autoload_register(
    function($class) {
        require_once "database/classes/$class.php";
    }
);


$msg = "<p>Continue as <a href = 'account/guestprocess.php'>Guest</a> or 
<a href = 'account/login.php'>Login</a> as User?</p>";


if (isset($_SESSION['guest'])){
    $msg = "<h3>
    <table align = 'center'>
        <tr>
            <th><a href = 'battleshiphome.php'><img src = 'images/ship.png' width = '80' height = '80'></a></th>
            <th></th>
            <th><a href = 'tictactoehome.php'><img src = 'images/tictactoe.png' width = '80' height = '80'></a></th>
            <th></th>
            <th><a href = 'sudokuhome.php'><img src = 'images/sudoku.png' width = '80' height = '80'></a></th>
        </tr>

        <tr>
            <th >battleship</th>
            <th></th>
            <th>tictactoe</th>
            <th></th>
            <th>&nbspsudoku</th> 
        </tr>

    </table>
    </h3>
    <p><a href = 'account/login.php'>Login as User?</a></p> ";
}

?>


<!doctype html>
<html>

<head>
    <title>homepage</title>
</head>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<?php require_once 'design/style.php'; 
require_once 'design/sidebar.php';?>

<h3><a href = 'home.php'><img src = 'images/game.png' width = '120' height = '120'></a></h3>
<h1> Welcome to Game Centre!</h1>

</br>

<?php 


if (isset($_SESSION['username'])){
    echo "<h3>
    <table align = 'center'>
        <tr>
            <th><a href = 'battleshiphome.php'><img src = 'images/ship.png' width = '80' height = '80'></a></th>
            <th></th>
            <th><a href = 'tictactoehome.php'><img src = 'images/tictactoe.png' width = '80' height = '80'></a></th>
            <th></th>
            <th><a href = 'sudokuhome.php'><img src = 'images/sudoku.png' width = '80' height = '80'></a></th>
        </tr>

        <tr>
            <th >battleship</th>
            <th></th>
            <th>tictactoe</th>
            <th></th>
            <th>&nbspsudoku</th> 
        </tr>

    </table>";
    
}

if (isset($_SESSION['username'])){
    //means logged in 
    
    $dao = new PlayerDAO();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $player = $dao -> get($username,$password);
    $name = $player -> getFullName();

    $msg = "</br><h3>hello $name!</h3>
    <h3>Total number of games played: {$player -> getTotalgames()}</h3>
    <h3>Total number of games won: {$player -> getTotalwins()}</h3></br>";

}

echo $msg;
if (isset($_SESSION['username'])){
    echo "</h3><p><a href = 'account/logout.php'>logout</a></p>";
}


?>

</body>

</html>