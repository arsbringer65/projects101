<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Content-Type: application/json; charset=utf8");

date_default_timezone_set("Asia/Manila");
set_time_limit(1000);

define("SERVER", "localhost");
define("DBASE", "repose");
define("USER", "root");
define("PWORD", "");

class Connection{
    // "mysql:host=localhost;dbname=sample_elective;charset=utf8mb4"
    protected $con_string = "mysql:host=".SERVER.";dbname=".DBASE.";charset=utf8mb4";


    protected $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false
    ];

    public function connect(){
        return new \PDO($this->con_string, USER, PWORD, $this->options);
    }


}




?>