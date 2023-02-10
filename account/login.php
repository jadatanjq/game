<?php

session_start();
if (isset($_SESSION['username'])){
    header('location: battleship.php');
    exit;
}
// $user = ['Enter Username:', 'Enter Password:'];
$user = ['',''];

if (isset($_SESSION['error'])){
    $error = $_SESSION['error'];
    echo "<h3> $error </h3>";
    unset($_SESSION['error']);
    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
    
}


?>

<!doctype html>
<html>
    <head>
        <title> user login </title>
        </head>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<?php require_once '../design/style.php'; 
require_once '../design/sidebar.php';?>

<h3><a href = '../home.php'><img src = '../images/game.png' width = '100' height = '100'></a></h3>
<h1> Login Page</h1>
<form action = "loginprocess.php" method = "POST">
<table align = 'center'>
    
    <tr> 
        <th  align = 'left'>Username:</th>
    </tr>
    <tr> 
        <td  ><input type = 'text' name = 'username' size = '30' required = 'required' <?php echo "value = '{$user[0]}'" ?>></td>
    </tr>
    <tr> 
        <th align = 'left'>Password:</th>
    </tr>
    <tr> 
        <td ><input type = 'text' name = 'password' size = '30' required = 'required' <?php echo "value = '{$user[1]}'" ?>></td>
    </tr> 

    <tr>
        <th><input type = 'submit' name = 'submit' value = 'Login' ></th>
    </tr>
</table>

</br>
    </form>
</br></br></br>
<p><a href = "createnew.php">Create a new account?</a></p> 


</body>

</html>
