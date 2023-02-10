<?php

session_start();
$_SESSION['guest'] = TRUE;

header('location: ../home.php');
exit;

?>