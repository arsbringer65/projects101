<?php

class Get{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;

    }

    public function get_users(){
        $data = array();
        $errmsg = "";

        $sql = 'SELECT * FROM userss';

        try{
            if($result = $this->pdo->query($sql)->fetchAll()){
                foreach($result as $record){
                    array_push($data, $record);
                }
                $result = null;
                return array("code"=>200, "data"=>$data);

            }else{
                $result = null;
            }
        }catch(PDOException $e){
            return array("code"=>404, "errmsg"=>$e->getMessege);
        }
    }
}