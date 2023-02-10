<?php

session_start();
spl_autoload_register(
    function($class) {
        require_once "../database/classes/$class.php";
    }
);

if (isset($_SESSION['guest'])){
    $msg = "<h3>
    <table align = 'center'>
        <tr>
            <th> Rules of the game: </th>
        </tr>
        <tr>
            <th> <ul>
            <li> this is a two player game</li>
            <li> first person to get 3 in a row,  wins!</li>
            </ul></th>
        </tr>
        <tr>
            <th><p><a href = 'tictactoe/tictactoe.php'>Start Game</a></p></th>
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

}
?>

<!doctype html>
<html>

<head>
    <title>Tictactoe character selection</title>
    </head>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<?php require_once '../design/style.php'; 
require_once '../design/sidebar.php';?>


    <h3><a href = '../tictactoehome.php'><img src = '../images/tictactoe.png' width = '100' height = '100'></a></h3>
    <h1> choose your characters!</h1>

</br>

<?php 

echo "<form action = 'gameprocess.php' method = 'post'>
<table align = 'center'>

<tr> 
<th><img src = '../images/cross.png' width = '50' height = '50'></th>
<th></th>
<th><img src = '../images/default.png' width = '50' height = '50'></th>
</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

<tr>
    <td>player one  <input type = 'text' name = 'p1'></td>
    <th></th>
    <td>player two  <input type = 'text' name = 'p2'></td>
</tr>

<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

<tr> 
    <th colspan = '3'><input type = 'submit' value = 'confirm'></th>
</tr>
</table>
</form>";

    echo "<p><a href = 'account/logout.php'>logout</a></p>";

?>



</body>

</html>