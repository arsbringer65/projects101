<?php

class Post{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;

    }

    public function add_user($data){
        return "inserting....";
    
    }
}