<?php

session_start();
spl_autoload_register(
    function($class) {
        require_once "../database/classes/$class.php";
    }
);

if (!isset($_SESSION['username'])){
    $_SESSION['error'] = 'Please log in first';
    header('location: login.php');
    exit;
}


$dao = new PlayerDAO();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$player = $dao -> get($username,$password);

$name = $player->getFullname();

if (isset($_SESSION['status'])){
    echo "<h3>{$_SESSION['status']}</h3>";
    unset($_SESSION['status']);
}

?>
<!doctype html>
<html>

<head>
    <title>My Profile</title>
</head>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<?php require_once '../design/style.php'; 
require_once '../design/sidebar.php';?>

<h3><a href = '../home.php'><img src = '../images/game.png' width = '100' height = '100'></a></h3>
<h1> My Profile </h1>

    </br>
<form action = 'update.php' method = 'post'>
<table align = 'center'>
    <tr>
        <th>Username</th>
    </tr>
    <tr>
        <td><?php echo "$username" ?></td>
    </tr>
    <tr>
        <th>Name</th>
    </tr>
    <tr>
        <td><input type="text" name="name" <?php echo "value = $name" ?>></td>
    </tr>
    <tr>
        <th><input type = 'submit' name="update" value = 'Update'></th>
    </tr>
</table>
</form>
    
</body>
</html>