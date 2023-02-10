<?php

session_start();
spl_autoload_register(
    function($class) {
        require_once "../database/classes/$class.php";
    }
);

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
    $count = $_SESSION['count'];
    $ship = $_SESSION['ship'];

    if (isset($_GET['row'])){
        $row = $_GET['row'];
        $col = $_GET['col'];
    }
    if (isset($_GET['row']) && $game[$row][$col] != 'X'){
        $count--;
    }


    if ($count <= 0){
        echo "<h3>Sorry, you've lost!</h3>";
        $game[$ship[0]][$ship[1]] = "1";
        $game[$row][$col] = "X";
        unset($_SESSION['ship']);
        unset($_SESSION['count']);
        unset($_SESSION['game']);
        if (isset($dao)){
            $dao -> addgames($player);
        }

    }
    else if (isset($row)){
        if ([$row,$col] == $ship){
        echo "<h3>Congrats, you've won!</h3>";
        $game[$ship[0]][$ship[1]] = "1";
        unset($_SESSION['ship']);
        unset($_SESSION['count']);
        unset($_SESSION['game']);
        if (isset($dao)){
            $dao -> addwins($player);
        }
        

        }else{
            echo "<h3>Sorry, wrong guess. Try again!</h3>";
            $game[$row][$col] = "X";
            $_SESSION['game'] = $game;
            $_SESSION['count'] = $count;
        }
    }


}else {
    $game = [
        ['O','O','O','O','O'],
        ['O','O','O','O','O'],
        ['O','O','O','O','O'],
        ['O','O','O','O','O'],
        ['O','O','O','O','O']
    ];
    $count = 5;
    $shipr = rand(0,4);
    $shipc = rand(0,4);
    $ship = [$shipr,$shipc];
    $_SESSION['game'] = $game;
    $_SESSION['count'] = $count;
    $_SESSION['ship'] = $ship;
    // if (isset($dao)){
    //     $dao -> addgames($player);
    // }

    
}

?>

<!doctype html>
<html>
    <head>
        <title> battleship </title>
        </head>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<?php require_once '../design/style.php'; 
require_once '../design/sidebar.php';?>

    <h3><a href = '../battleshiphome.php'><img src = '../images/ship.png' width = '100' height = '100'></a></h3>
        <h1> battleship game </h1>

        <table align = 'center'>
        <tr><th colspan = '5'>----------------------------------------------------------------------</th></tr>
       
        <?php

        if (!isset($row)){
            $row = '';
            $col = '';
            // $ship = [];
        }
        if ($count == 0 or [$row,$col] == $ship){
            for ($r = 0; $r < 5; $r++){
                echo "<tr >";
                for ($c = 0; $c < 5; $c++){
                    if ($game[$r][$c] == 'O'){
                        echo "<th><img src = '../images/default.png' width = '20' height = '20'></th>";
                    }else if ($game[$r][$c] == 'X'){
                        echo "<th><img src = '../images/space.png' width = '20' height = '20'></th>";
                    }else if ($game[$r][$c] == '1'){
                        echo "<th><img src = '../images/ship.png' width = '20' height = '20'></th>";
                    }
                    // echo "<th >{$game[$r][$c]}</th>";
                }
                echo "</tr>";
                if ($r != 4){
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                }
            }
        }else{
            for ($r = 0; $r < 5; $r++){
                echo "<tr >";
                for ($c = 0; $c < 5; $c++){
                    if ($game[$r][$c] == 'O'){
                        echo "<th><a href = 'battleship.php?row=$r&col=$c'><img src = '../images/default.png' width = '20' height = '20'></a></th>";
                    }else if ($game[$r][$c] == 'X'){
                        echo "<th><a href = 'battleship.php?row=$r&col=$c'><img src = '../images/space.png' width = '20' height = '20' ></a></th>";
                    }else{
                        echo "<th><img src = '../images/ship.png' width = '20' height = '20'></th>";
                    }

                    // if ($game[$r][$c] == "X"){
                    //     echo "<th>{$game[$r][$c]}</th>";
                    // }else{
                    //     echo "<th><a href = 'game.php?row=$r&col=$c'> {$game[$r][$c]} </a></th>";
                    // }
                    
                }
                echo "</tr>";
                if ($r != 4){
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                    echo "<tr></tr>";
                }
            }
        }
        
        ?>
        <tr><th colspan = '5'>----------------------------------------------------------------------</th></tr>

        </table>
        


        <?php

        echo "<h3> Number of Lives left: $count </h3>";
        ?>
        

        <h3><p><a href = 'gameprocess.php'>New game?</a></p></h3>


    </body>

</html>
