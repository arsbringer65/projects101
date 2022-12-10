<?php

class Get{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
        $this->gm = new GlobalMethod($pdo);

    }

    public function get_admin($id = null){
        
        $sql = "SELECT * FROM user_admin";
        if($id != null){
            $sql .= " AND id_no = $id";
        }
 

        $res = $this->gm->execute_query($sql);
        if($res['code']==200){
            return $this->gm->response_payload($res['data'], "success", "Successfully Retrieved user data.", $res['code']);
        }
        return $this->gm->response_payload("No data found", "failed", "Failed to Retrieved user data.", $res['code']);
    }

    public function get_sched($brgy = null){
        $sql = "SELECT * FROM schedule";
        if($brgy != null){
            $sql .= " AND brgy = $brgy";
        }
 

        $res = $this->gm->execute_query($sql);
        if($res['code']==200){
            return $this->gm->response_payload($res['data'], "success", "Successfully Retrieved queu data.", $res['code']);
        }
        return $this->gm->response_payload("No data found", "failed", "Failed to Retrieved queu data.", $res['code']);
    }

    public function get_news($id = null){
        
        $sql = "SELECT * FROM news";
        if($id != null){
            $sql .= " AND id = $id";
        }
 

        $res = $this->gm->execute_query($sql);
        if($res['code']==200){
            return $this->gm->response_payload($res['data'], "success", "Successfully Retrieved queu data.", $res['code']);
        }
        return $this->gm->response_payload("No data found", "failed", "Failed to Retrieved queu data.", $res['code']);
    }



}