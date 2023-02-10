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

// if (!isset($_POST['submit']) or $_POST['username'] == '' or $_POST['password'] == '' or $_POST['password2'] == ''){
//     header('Location: login.php');
//     exit;
// }



$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$user = [$username,$name,$password,$password2];

if ($password != $password2){
    $error = 'Password does not match';
    $_SESSION['error2'] = $error;
    $_SESSION['user'] = $user;

    header('Location: register.php');
    exit;

}else if ($dao -> get($username,$password) != null){
    $error = 'Account already exists';
    $_SESSION['error2'] = $error;
    $_SESSION['user'] = $user;

    header('Location: register.php');
    exit;

}else{
    $player = new Player($username, $name, 0, 0);
    $status = $dao -> add($player,$password);
    if ($status){
        $error = 'Account has been created.';
        $_SESSION['error2'] = $error;
        $_SESSION['user'] = $user;
        header('Location: register.php');
        exit;
    }else {
        $error = 'Account could not be created';
        $_SESSION['error2'] = $error;
        $_SESSION['user'] = $user;
        header('Location: register.php');
        exit;
    }

    
}



?>

