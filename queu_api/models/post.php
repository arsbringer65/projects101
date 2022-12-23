<?php

class Post
{

    private $pdo;
    private $gm;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->gm = new GlobalMethod($pdo);
    }


    public function add_user($data)
    {

        $sql = "INSERT INTO users(fname, lname , email , student_id, password, archived)
            VALUES('$data->fname', '$data->lname', '$data->email', '$data->student_id', ?, '0');";

        try {
            $stmt = $this->pdo->prepare($sql);
            $data->password = password_hash($data->password, PASSWORD_DEFAULT);
            $stmt->execute([$data->password]);
            return $this->gm->response_payload($data, "success", "Succesfully added user.", 200);
        } catch (PDOException $e) {
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);
        }
    }

    public function add_queu($data)
    {

        $sql = "INSERT INTO queu(user_id, queu_no, dpt, date_time, archived)
            VALUES(?,?,?,?,'0');";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$data->user_id, $data->queu_no, $data->dpt, $data->date_time]);
            return $this->gm->response_payload($data, "success", "Succesfully added queu.", 200);
        } catch (PDOException $e) {
            return $this->gm->response_payload(null, "failed", $e->getMessage(), 400);
        }
    }
    // login
    public function login($data)
    {
        $username = $data->email;
        $password = $data->password;
        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute([$username]);
            if ($stmt->rowCount() > 0) {
                $res = $stmt->fetchAll()[0];
                if (password_verify($password, $res['password'])) {
                    $data = array(
                        "fname" => $res['fname'],
                        "lname" => $res['lname'],
                        "student_id" => $res['student_id']
                    );

                    return $this->gm->response_payload($data, "success", "Succesfully logged in.", 200);
                } else {
                    return $this->gm->response_payload(null, "failed", "Incorrect password", 401);
                }
            } else {
                return $this->gm->response_payload(null, "failed", "Incorrect username", 401);
            }
        } catch (\PDOException $e) {
            return $this->gm->response_payload(null, "failed", "Unable to process data.", 401);
        }
    }
}
