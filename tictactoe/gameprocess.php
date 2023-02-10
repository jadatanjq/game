<?php
session_start();
unset($_SESSION['turn']);
unset($_SESSION['game']);
unset($_SESSION['players']);

$p1 = $_POST['p1']; 
$p2 = $_POST['p2']; 
if ($p1 == ''){
    $p1 = 'player one'; 
}

if ($p2 == ''){
    $p2 = 'player two'; 
}

$_SESSION['players'] = [$p1,$p2];

header('location: tictactoe.php');
exit;
?>