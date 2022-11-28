<?php

class Get{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
        $this->gm = new GlobalMethod($pdo);

    }

    public function get_users($id = null){
        
        $sql = "SELECT * FROM users";
        if($id != null){
            $sql .= " WHERE student_id = $id";
        }
 

        $res = $this->gm->execute_query($sql);
        if($res['code']==200){
            return $this->gm->response_payload($res['data'], "success", "Successfully Retrieved user data.", $res['code']);
        }
        return $this->gm->response_payload("No data found", "failed", "Failed to Retrieved user data.", $res['code']);
    }
}