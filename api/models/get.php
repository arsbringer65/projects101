<?php

class Get{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
        $this->gm = new GlobalMethod($pdo);

    }

    public function get_users($id = null){
        
        $sql = "SELECT * FROM users WHERE archived= 0";
        if($id != null){
            $sql .= " AND student_id = $id";
        }
 

        $res = $this->gm->execute_query($sql);
        if($res['code']==200){
            return $this->gm->response_payload($res['data'], "success", "Successfully Retrieved user data.", $res['code']);
        }
        return $this->gm->response_payload("No data found", "failed", "Failed to Retrieved user data.", $res['code']);
    }

    public function get_queus($id = null){
        
        $sql = "SELECT * FROM queu WHERE archived = 0";
        if($id != null){
            $sql .= " AND user_id = $id";
        }
 

        $res = $this->gm->execute_query($sql);
        if($res['code']==200){
            return $this->gm->response_payload($res['data'], "success", "Successfully Retrieved queu data.", $res['code']);
        }
        return $this->gm->response_payload("No data found", "failed", "Failed to Retrieved queu data.", $res['code']);
    }



}