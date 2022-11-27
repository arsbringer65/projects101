<?php

class GlobalMethod{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;

    }
}