<?php

class PlayerDAO {

    public function add($player,$password){
        $sql = 'insert into 
        player(username, fullname, totalgames, totalwins, hashedpassword)
        values (:username, :fullname, :totalgames, :totalwins, :hashedpassword);';

        $conn = new ConnectionManager();
        $pdo = $conn -> getConnection();

        $username = $player -> getUsername();
        $fn = $player -> getFullname();
        $hashed = password_hash($password,PASSWORD_DEFAULT);
        $tg = $player -> getTotalgames();
        $tw = $player -> getTotalwins();

        $stmt = $pdo -> prepare($sql);
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $stmt -> bindParam(':username',$username,PDO::PARAM_STR);
        $stmt -> bindParam(':fullname',$fn,PDO::PARAM_STR);
        $stmt -> bindParam(':hashedpassword',$hashed,PDO::PARAM_STR);
        $stmt -> bindParam(':totalgames',$tg,PDO::PARAM_INT);
        $stmt -> bindParam(':totalwins', $tw,PDO::PARAM_INT);
        $status = $stmt -> execute();

        $stmt = null;
        $pdo = null;

        return $status;
    }


    public function get($username, $password) {
    
        $conn = new ConnectionManager();
        $pdo = $conn -> getConnection();

        $sql = 'select * from Player where username = :username';
    
        $stmt = $pdo -> prepare($sql);
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $stmt -> bindParam(':username',$username,PDO::PARAM_STR);
        $stmt -> execute();
        $player = null;
    
    
        while ($row = $stmt -> fetch()){
            $hashed = $row['hashedpassword'];
            if (password_verify($password,$hashed)){
                $fn = $row['fullname'];
                $tg = $row['totalgames'];
                $tw = $row['totalwins'];
                $player = new Player($username, $fn, $tg, $tw);
                return $player;
            }
        }
        $stmt = null;
        $pdo = null;
    
        return $player;
    }

    public function addgames($player){
        $conn = new ConnectionManager();
        $pdo = $conn -> getConnection();
        $username = $player -> getUsername();
        $totalgames = $player -> getTotalgames();
        $totalgames ++;

        $sql = 'update Player set totalgames = :totalgames where username = :username';
    
        $stmt = $pdo -> prepare($sql);
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $stmt -> bindParam(':username',$username,PDO::PARAM_STR);
        $stmt -> bindParam(':totalgames',$totalgames,PDO::PARAM_INT);
        $status = $stmt -> execute();


        $stmt = null;
        $pdo = null;
    
        return $status;
    }

    public function addwins($player){
        $conn = new ConnectionManager();
        $pdo = $conn -> getConnection();
        $username = $player -> getUsername();
        $totalwins = $player -> getTotalwins();
        $totalwins ++;

        $sql = 'update Player set totalwins = :totalwins where username = :username';
    
        $stmt = $pdo -> prepare($sql);
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $stmt -> bindParam(':username',$username,PDO::PARAM_STR);
        $stmt -> bindParam(':totalwins',$totalwins,PDO::PARAM_INT);
        $status = $stmt -> execute();


        $stmt = null;
        $pdo = null;
    
        return $status;
    }

    public function update($player,$name){
        $conn = new ConnectionManager();
        $pdo = $conn -> getConnection();
        $usn = $player -> getUsername();

        $sql = 'update Player set fullname = :name where username = :usn';
    
        $stmt = $pdo -> prepare($sql);
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $stmt -> bindParam(':usn',$usn,PDO::PARAM_STR);
        $stmt -> bindParam(':name',$name,PDO::PARAM_STR);
        $status = $stmt -> execute();


        $stmt = null;
        $pdo = null;
    
        return $status;
    }

}
?>
