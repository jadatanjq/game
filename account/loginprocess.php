<?php

session_start();

spl_autoload_register(
    function($class) {
        require_once "../database/classes/$class.php";
    }
);

$dao = new PlayerDAO();
$username = '';
$error = '';

if (!isset($_POST['submit']) or $_POST['username'] == '' or $_POST['password'] == ''){
    header('Location: login.php');
    exit;
}


$username = $_POST['username'];
$password = $_POST['password'];
$user = [$username,$password];



if ($dao -> get($username,$password) == null){
    $error = 'Incorrect username or password';
    $_SESSION['error'] = $error;
    $_SESSION['user'] = $user;


    header('Location: login.php');
    exit;

}else{

    $player = $dao -> get($username,$password);
    $fn = $player -> getFullname();

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['name'] = $fn;
    unset($_SESSION['guest']);

    header('Location: ../home.php');
    exit;
}



?>

