<?php

class Post
{
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function add_user($payload)
    {
        $sqlString = "INSERT INTO students_tbl(studnum_fld, fname_fld, mname_fld, lname_fld, email_fld, password_fld) 
        VALUES (?,?,?,?,?,?)";

        try {
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute(array(
                $payload->studnum_fld,
                $payload->fname_fld,
                $payload->mname_fld,
                $payload->lname_fld,
                $payload->email_fld,
                $payload->password_fld
            ));
            http_response_code(200);
            return array("payload" => null, "message" => "Inserted succesfully", "remarks" => "success", "timestamp" => date_create());
        } catch (\PDOException $e) {
            http_response_code(400);
            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }

    public function update_user($payload, $userid)
    {
        $sqlString = "UPDATE students_tbl SET fname_fld=?, mname_fld=?, lname_fld=?, email_fld=? WHERE studnum_fld='$userid'";

        try {
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute(array(
                $payload->fname_fld,
                $payload->mname_fld,
                $payload->lname_fld,
                $payload->email_fld
            ));
            http_response_code(200);

            return array("payload" => null, "message" => "Inserted succesfully", "remarks" => "success", "timestamp" => date_create());
        } catch (\PDOException $e) {
            http_response_code(400);

            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }

    public function delete_user($payload, $userid)
    {
        $sqlString = "UPDATE students_tbl SET isdeleted_fld=? WHERE studnum_fld='$userid'";

        try {
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute(array(
                $payload->isdeleted_fld
            ));
            http_response_code(200);

            return array("payload" => null, "message" => "Delete succesfully", "remarks" => "success", "timestamp" => date_create());
        } catch (\PDOException $e) {
            http_response_code(400);

            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }


    public function add_classes($payload)
    {
        $sqlString = "INSERT INTO classes_tbl(classcode_fld, subjdesc_fld) 
        VALUES (?,?)";

        try {
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute(array(
                $payload->classcode_fld,
                $payload->subjdesc_fld,
            ));
            http_response_code(200);
            return array("payload" => null, "message" => "Inserted succesfully", "remarks" => "success", "timestamp" => date_create());
        } catch (\PDOException $e) {
            http_response_code(400);
            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }

    public function update_classes($payload, $userid)
    {
        $sqlString = "UPDATE classes_tbl SET subjdesc_fld=? WHERE classcode_fld='$userid'";

        try {
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute(array(
                $payload->subjdesc_fld,
            ));
            http_response_code(200);

            return array("payload" => null, "message" => "Inserted succesfully", "remarks" => "success", "timestamp" => date_create());
        } catch (\PDOException $e) {
            http_response_code(400);

            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }

    public function delete_classes($payload, $userid)
    {
        $sqlString = "UPDATE classes_tbl SET isdeleted_fld=? WHERE classcode_fld='$userid'";

        try {
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute(array(
                $payload->isdeleted_fld
            ));
            http_response_code(200);

            return array("payload" => null, "message" => "Inserted succesfully", "remarks" => "success", "timestamp" => date_create());
        } catch (\PDOException $e) {
            http_response_code(400);

            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }


    public function add_subject($payload)
    {
        $sqlString = "INSERT INTO enrolledsubj_tbl(studnum_fld, classcode_fld, mgrade_fld, fgrade_fld) 
        VALUES (?,?,?,?)";

        try {
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute(array(
                $payload->studnum_fld,
                $payload->classcode_fld,
                $payload->mgrade_fld,
                $payload->fgrade_fld,
            ));
            http_response_code(200);
            return array("payload" => null, "message" => "Inserted succesfully", "remarks" => "success", "timestamp" => date_create());
        } catch (\PDOException $e) {
            http_response_code(400);
            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }

    public function update_subject($payload, $userid)
    {
        $sqlString = "UPDATE enrolledsubj_tbl SET fname_fld=?, mname_fld=?, lname_fld=?, email_fld=? WHERE studnum_fld='$userid'";

        try {
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute(array(
                $payload->classcode_fld,
                $payload->mgrade_fld,
                $payload->fgrade_fld
            ));
            http_response_code(200);

            return array("payload" => null, "message" => "Inserted succesfully", "remarks" => "success", "timestamp" => date_create());
        } catch (\PDOException $e) {
            http_response_code(400);

            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }

    public function delete_subject($payload, $userid)
    {
        $sqlString = "UPDATE enrolledsubj_tbl SET isdeleted_fld=? WHERE studnum_fld='$userid'";

        try {
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute(array(
                $payload->isdeleted_fld
            ));
            http_response_code(200);

            return array("payload" => null, "message" => "Inserted succesfully", "remarks" => "success", "timestamp" => date_create());
        } catch (\PDOException $e) {
            http_response_code(400);

            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }

    public function login($payload)
    {
        $sql = "SELECT * FROM students_tbl WHERE email_fld = '$payload->email_fld' AND isdeleted_fld = 0";

        $data = array();
        try {
            if ($result = $this->pdo->query($sql)->fetchAll()) {
                foreach ($result as $record) {
                    array_push($data, $record);
                }
                $result = null;
                $password = $data[0]['password_fld'];
                if ($password === $payload->password_fld) {
                    return $data;
                } else {
                    $err = "Invalid Password or Email! Please try again.";
                    http_response_code(404);
                    return array("payload" => null, "message" => $err, "remarks" => "failed", "timestamp" => date_create());
                }
            }
        } catch (\PDOException $e) {
            http_response_code(400);
            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }
}
