<?php

class Delete{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
        $this->gm = new GlobalMethod($pdo);

    }

    public function delete_user($id){
        $data = array();
        $sql = "DELETE FROM users WHERE id = ?";
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $this->gm->response_payload(null, "success", "Succesfully deleted data.", 200);
        }
        catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);
        }  
    }

    public function delete_queue($id){
        $data = array();
        $sql = "DELETE FROM queu WHERE id = ?";
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $this->gm->response_payload(null, "success", "Succesfully deleted data.", 200);
        }
        catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);
        }  
    }
}