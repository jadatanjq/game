<?php

function checkboard($board){
    foreach ($board as $row){
        if ($row[0] == $row[1] and $row[1] == $row[2] and $row[2] != '1'){
            return TRUE;
        }
    }

    for ($i = 0; $i < 3; $i++){
        if ($board[0][$i] == $board[1][$i] and $board[1][$i] == $board[2][$i] and $board[2][$i] != '1'){
            return TRUE;
        }
        
    }

    if ($board[0][0] == $board[1][1] and $board[1][1] == $board[2][2] and $board[2][2] != '1'){
        return TRUE;
    }

    if ($board[0][2] == $board[1][1] and $board[1][1] == $board[2][0] and $board[2][0] != '1'){
        return TRUE;
    }

    return FALSE;

};

?>