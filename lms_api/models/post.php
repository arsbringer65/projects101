<?php

class Post{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
        $this->gm = new GlobalMethod($pdo);

    }


    public function add_employee($data){
        
        $sql = "INSERT INTO employees(fname, lname , email , dpt, position, password)
            VALUES('$data->fname', '$data->lname', '$data->email', '$data->dpt', '$data->position', ?);";

        try{
            $stmt = $this->pdo->prepare($sql);
            $data->password = password_hash($data->password, PASSWORD_DEFAULT);
            $stmt->execute([$data->password]);
            return $this->gm->response_payload($data, "success", "Succesfully added user.", 200);

               
        }catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);        
        }    
    }

    public function add_admin($data){
        
        $sql = "INSERT INTO admins(fname, lname , email , password)
            VALUES('$data->fname', '$data->lname', '$data->email', ?);";

        try{
            $stmt = $this->pdo->prepare($sql);
            $data->password = password_hash($data->password, PASSWORD_DEFAULT);
            $stmt->execute([$data->password]);
            return $this->gm->response_payload($data, "success", "Succesfully added admin.", 200);

               
        }catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);        
        }    
    }

    public function add_request($data){
        
        $sql = "INSERT INTO request(user_id, leave_type, approve)
            VALUES(?,?,'pending');";

        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$data->user_id,$data->leave_type]);
            return $this->gm->response_payload($data, "success", "Succesfully added queu.", 200);

               
        }catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);        
        }    
    }

    public function login($data)
    {
        $username = $data->email;
        $password = $data->password;
        $sql = "SELECT * FROM employees WHERE email = ? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute([$username]);
            if ($stmt->rowCount() > 0) {
                $res = $stmt->fetchAll()[0];
                if (password_verify($password, $res['password'])) {
                    $data = array(
                        "fname" => $res['fname'],
                        "lname" => $res['lname'],
                        "position" => $res['position']
                    );

                    return $this->gm->response_payload($data, "success", "Succesfully logged in.", 200);
                } else {
                    return $this->gm->response_payload(null, "failed", "Incorrect password", 401);
                }
            }
            else{
                return $this->gm->response_payload(null, "failed", "Incorrect username", 401);
            }
        } catch (\PDOException $e) {
            return $this->gm->response_payload(null, "failed", "Unable to process data.", 401);
        }
    }

    

    public function approve_request($data, $id){
        // $approve = "approved";
        $sql = "UPDATE request SET approve=? WHERE id=?";
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$data->approve,$id]);
            return $this->gm->response_payload(null, "success", "Succesfully approved.", 200);
        }
        catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);
        }    
    }

    public function edit_request($data, $id){
        // $approve = "approved";
        $sql = "UPDATE request SET leave_type=?, starting_time=?, ending_time=? WHERE id=?";
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$data->leave_type, $data->starting_time, $data->ending_time, $id]);
            return $this->gm->response_payload(null, "success", "Succesfully approved.", 200);
        }
        catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);
        }    
    }

    
}