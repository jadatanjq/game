<?php

session_start();
unset($_SESSION['username']);
if (isset($_SESSION['username'])){
    header('location: ../battleship/battleship.php');
    exit;
}
if (isset($_SESSION['error2'])){
    $error = $_SESSION['error2'];
    echo "<h3> $error </h3>";
    $user = $_SESSION['user'];
    // foreach ($user as $item){
    //     echo $item;
    // }

}else{
    // $user = ['Enter Username','Enter Name','Enter Password','Re-enter Password'];
    $user = ['','','',''];
}



?>

<!doctype html>
<html>
    <head>
        <title> user registration </title>
        </head>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<?php require_once '../design/style.php'; 
require_once '../design/sidebar.php';?>

    <h3><a href = '../home.php'><img src = '../images/game.png' width = '100' height = '100'></a></h3>
    <h1> Create a new account</h1>
    </br>
    

    <form action = "registerprocess.php" method = "POST">
        <table align = 'center'>
            
            <tr> 
                <th >Username:</th>
            </tr>
            <tr> 
                <td  ><input type = 'text' name = 'username' size = '40' required = 'required' <?php echo "value = '{$user[0]}'"; ?> ></td>
            </tr>
            <tr> 
                <th >Name</th>
            </tr>
            <tr> 
                <td ><input type = 'text' name = 'name' size = '40'<?php echo "value = '{$user[1]}'"; ?>></td>
            </tr> 
            <tr> 
                <th>Password:</th>
            </tr>
            <tr> 
                <td ><input type = 'text' name = 'password' size = '40' required = 'required' <?php echo "value = '{$user[2]}'"; ?>></td>
            </tr> 
            <tr> 
                <th>Confirm Password:</th>
            </tr>
            <tr> 
                <td ><input type = 'text' name = 'password2' size = '40' required = 'required' <?php echo "value = '{$user[3]}'"; ?>></td>
            </tr> 
            <tr>
                <th><input type = 'submit' name = 'submit' value = 'Register' ></ths>
            </tr>
        </table>
        
    <!-- </br></br></br></br></br></br></br></br></br></br> -->
        <!-- <p><a href = 'home.php'>Back to homepage?</a></p> -->

    </body>

</html>
