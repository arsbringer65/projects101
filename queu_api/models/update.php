<?php

class Update{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
        $this->gm = new GlobalMethod($pdo);

    }

    // Archive Queus
    public function approve_request($id){
        $sql = "UPDATE request SET approve='accepted' WHERE id=?";
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $this->gm->response_payload(null, "success", "Succesfully archived data.", 200);
        }
        catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);
        }    
    }

    public function reject_request($id){
        $sql = "UPDATE request SET approve='rejected' WHERE id=?";
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $this->gm->response_payload(null, "success", "Succesfully archived data.", 200);
        }
        catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);
        }    
    }

    public function archived_user($id){
        $sql = "UPDATE employees SET archived=1 WHERE id=?";
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $this->gm->response_payload(null, "success", "Succesfully archived data.", 200);
        }
        catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);
        }    
    }


}