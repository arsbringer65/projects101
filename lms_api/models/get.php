<?php

class Get{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
        $this->gm = new GlobalMethod($pdo);

    }

    public function get_employees($id = null){
        
        $sql = "SELECT * FROM employees";
        if($id != null){
            $sql .= " WHERE id = $id";
        }
 

        $res = $this->gm->execute_query($sql);
        if($res['code']==200){
            return $this->gm->response_payload($res['data'], "success", "Successfully Retrieved employee data.", $res['code']);
        }
        return $this->gm->response_payload("No data found", "failed", "Failed to Retrieved employee data.", $res['code']);
    }

    public function get_request($id = null){
        
        $sql = "SELECT * FROM request";
        if($id != null){
            $sql .= " WHERE user_id = $id";
        }
 

        $res = $this->gm->execute_query($sql);
        if($res['code']==200){
            return $this->gm->response_payload($res['data'], "success", "Successfully Retrieved request data.", $res['code']);
        }
        return $this->gm->response_payload("No data found", "failed", "Failed to Retrieved request data.", $res['code']);
    }

    public function get_admin($id = null){
        
        $sql = "SELECT * FROM admin";
        if($id != null){
            $sql .= " WHERE id = $id";
        }
 

        $res = $this->gm->execute_query($sql);
        if($res['code']==200){
            return $this->gm->response_payload($res['data'], "success", "Successfully Retrieved admin data.", $res['code']);
        }
        return $this->gm->response_payload("No data found", "failed", "Failed to Retrieved admin data.", $res['code']);
    }



}