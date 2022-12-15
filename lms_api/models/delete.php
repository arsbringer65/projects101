<?php
class Delete
{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->gm = new GlobalMethod($pdo);

    }

    public function delete_employee($id){
        $data = array();
        $sql = "DELETE FROM employees WHERE id = ?";
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $this->gm->response_payload(null, "success", "Succesfully deleted data.", 200);
        }
        catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);
        }  
    }

    public function delete_request($id){
        $data = array();
        $sql = "DELETE FROM request WHERE id = ?";
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $this->gm->response_payload(null, "success", "Succesfully deleted data.", 200);
        }
        catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);
        }  
    }

    public function delete_admin($id){
        $data = array();
        $sql = "DELETE FROM admin WHERE id = ?";
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