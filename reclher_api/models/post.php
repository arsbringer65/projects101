<?php

class Post{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
        $this->gm = new GlobalMethod($pdo);

    }


    public function add_admin($data){
        
        $sql = "INSERT INTO user_admin(fname, lname , email , password, contact_no)
            VALUES('$data->fname', '$data->lname', '$data->email', ?, '$data->contact_no');";

        try{
            $stmt = $this->pdo->prepare($sql);
            $data->password = password_hash($data->password, PASSWORD_DEFAULT);
            $stmt->execute([$data->password]);
            return $this->gm->response_payload($data, "success", "Succesfully added user.", 200);

               
        }catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);        
        }    
    }

    public function add_sched($data){
        
        $sql = "INSERT INTO schedule(brgy, date, time)
            VALUES(?,?,?);";

        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$data->brgy, $data->date, $data->time]);
            return $this->gm->response_payload($data, "success", "Succesfully added queu.", 200);

               
        }catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);        
        }    
    }

    public function add_news($data){
        
        $sql = "INSERT INTO news(content)
            VALUES(?);";

        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$data->content]);
            return $this->gm->response_payload($data, "success", "Succesfully added queu.", 200);

               
        }catch(PDOException $e){
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);        
        }    
    }
    public function login($data)
    {
        $username = $data->email;
        $password = $data->password;
        $sql = "SELECT * FROM user_admin WHERE email = ? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute([$username]);
            if ($stmt->rowCount() > 0) {
                $res = $stmt->fetchAll()[0];
                if (password_verify($password, $res['password'])) {
                    $data = array(
                        "fname" => $res['fname'],
                        "lname" => $res['lname'],
                        // "token" => $res['token'],
                        // "is_archived" => $res['is_archived'],
                        "id_no" => $res['id_no']
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

        
    
}