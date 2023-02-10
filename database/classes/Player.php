<?php

class Player {
    private $username;
    private $fullname;
    private $totalgames;
    private $totalwins;
    
    public function __construct($username, $fullname,$totalgames,$totalwins){
        $this -> username = $username;
        $this -> fullname = $fullname;
        $this -> totalgames = $totalgames;
        $this -> totalwins = $totalwins;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getFullname(){
        return $this->fullname;
    }

    public function getTotalgames(){
        return $this->totalgames;
    }

    public function getTotalwins(){
        return $this->totalwins;
    }

}

?>