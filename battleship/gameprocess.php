<?php
session_start();
unset($_SESSION['ship']);
unset($_SESSION['count']);
unset($_SESSION['game']);
unset($_SESSION['players']);

header('location: battleship.php');
exit;
?>