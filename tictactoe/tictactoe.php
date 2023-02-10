<?php

session_start();
spl_autoload_register(
    function($class) {
        require_once "../database/classes/$class.php";
    }
);

require_once 'check.php';

$dao = null;
$player = null;

if (isset($_SESSION['username'])){
    //if logged in
    $dao = new PlayerDAO();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $player = $dao -> get($username,$password);

}

if (isset($_SESSION['game'])){
    $game = $_SESSION['game'];

    // if (!isset($_SESSION['players']) or !isset($_SESSION['turn'])){
    //     header("location: gameprocess.php");
    //     exit;
    // }


    $turn = $_SESSION['turn'];

    $p1 = $_SESSION['players'][0];
    $p2 = $_SESSION['players'][1];
    
    

    if (!$turn){
        $turn = 'O';
    }else{
        $turn = 'X';
    }


    if (isset($_GET['row'])){
        $row = $_GET['row'];
        $col = $_GET['col'];

        $game[$row][$col] = $turn;
        $_SESSION['game'] = $game;
        $status = checkboard($game);
        $_SESSION['turn'] = !$_SESSION['turn'];

        if ($status){
            if ($turn == 'X'){
                echo "<h3>yay $p1 won!</3>";
                if ($dao != null){
                    $dao -> addwins($player);
                }
            }else{
                echo "<h3>yay $p2 won!</3>";
            }
            
            unset($_SESSION['game']);
            unset($_SESSION['turn']);
            unset($_SESSION['players']);
            $win = TRUE;
        }

    }
        



}else {
    $game = [
        ['1','1','1'],
        ['1','1','1'],
        ['1','1','1']
        ];
        
    $_SESSION['game'] = $game;
    // $p1 = 'player one';
    // $p2 = 'player two';
    // if (isset($_POST['P1']) && $_POST['p1'] != ''){
    //     $p1 = $_POST['p1']; 
    // }

    // if (isset($_POST['P2']) && $_POST['p2'] != ''){
    //     $p2 = $_POST['p2']; 
    // }


    $p1 = $_SESSION['players'][0];
    $p2 = $_SESSION['players'][1];

    $_SESSION['players'] = [$p1,$p2];
    
    $_SESSION['turn'] = TRUE;
    
    $turn = "O";

    if ($dao != null){
        $dao -> addgames($player);
    }

    
}
?>

<!doctype html>
<html>
    <head>
        <title> tictactoe </title>
        </head>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<?php require_once '../design/style.php'; 
require_once '../design/sidebar.php';?>

<h3><a href = '../tictactoehome.php'><img src = '../images/tictactoe.png' width = '100' height = '100'></a></h3>
<h1> tictactoe game </h1>


<table align = 'center'>
        <tr><th colspan = '5'>----------------------------------------------------------------------</th></tr>
        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

        <?php

        if (!isset($row)){
            $row = '';
            $col = '';
            // $ship = [];
        }
        if (isset($win)){
            for ($r = 0; $r < 3; $r++){
                echo "<tr >";
                for ($c = 0; $c < 3; $c++){
                    if ($game[$r][$c] == '1'){
                        echo "<th><img src = '../images/blank.png' width = '30' height = '30'></th>";
                    }else if ($game[$r][$c] == 'X'){
                        echo "<th><img src = '../images/cross.png' width = '30' height = '30'></th>";
                    }else if ($game[$r][$c] == 'O'){
                        echo "<th><img src = '../images/default.png' width = '30' height = '30'></th>";
                    }
                }
                echo "</tr>";
                if ($r != 2){
                    echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
                    echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";


                }
            }
        }else{
            for ($r = 0; $r < 3; $r++){
                echo "<tr >";
                for ($c = 0; $c < 3; $c++){
                    if ($game[$r][$c] == '1'){
                        echo "<th><a href = 'tictactoe.php?row=$r&col=$c'><img src = '../images/blank.png' width = '30' height = '30'></a></th>";
                    }else if ($game[$r][$c] == 'X'){
                        echo "<th><img src = '../images/cross.png' width = '30' height = '30' ></a></th>";
                    }else{
                        echo "<th><img src = '../images/default.png' width = '30' height = '30'></th>";
                    }
                    
                }
                echo "</tr>";
                if ($r != 4){
                    echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
                    echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";


                }
            }
        }
        
        echo "<tr><th colspan = '5'>----------------------------------------------------------------------</th></tr>";
        
        if ($turn == 'O'){
            echo "<tr><th colspan = '3'><h3> Turn: $p1 </h3></th></tr>";   
        }else{
            echo "<tr><th colspan = '3'><h3> Turn: $p2 </h3></th></tr>";
        }
    
        // var_dump($_SESSION);
        ?>
        
        
        </table>


<h3><p><a href = 'gameprocess.php'>New game?</a></p></h3>

</body>
</html>