<?php

class Post{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
        $this->gm = new GlobalMethod();

    }

    public function add_user($data){
        $sql = "INSERT INTO "
    
    }
}