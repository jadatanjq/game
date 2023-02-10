<?php

session_start();

unset($_SESSION['user']);
unset($_SESSION['error2']);

header('Location: register.php');
exit;


?>