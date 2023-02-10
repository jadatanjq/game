<?php

session_start();
spl_autoload_register(
    function($class) {
        require_once "database/classes/$class.php";
    }
);

$dao = new PlayerDAO();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$player = $dao -> get($username,$password);

if (!isset($_SESSION['username'])){
    header('location: login.php');
    exit;
}

$username = '';
$name = '';

if (isset($_POST['username'])){
    $username = $_POST['username'];
}
if (isset($_POST['name'])){
    $username = $_POST['name'];
}

$status = $dao -> update($player, $username, $name);

if ($status){
    $_SESSION['status'] = 'Updated Successfully';
}else{
    $_SESSION['status'] = "Update Unsuccessfull";
}

header('location: account.php');
exit;

?>