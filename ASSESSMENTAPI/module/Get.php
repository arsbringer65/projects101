<?php

class Get
{
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function get_user($userid = null)
    {
        $sql = "SELECT * FROM students_tbl WHERE isdeleted_fld=0";
        if ($userid) {
            $sql .= " AND studnum_fld = '$userid'";
        }
        $data = array();
        try {
            if ($result = $this->pdo->query($sql)->fetchAll()) {
                foreach ($result as $record) {
                    array_push($data, $record);
                }
                $result = null;
                http_response_code(200);
                return array("payload" => $data, "message" => "succesfully retrieved data", "remarks" => "success", "timestamp" => date_create());
            } else {
                $err = "No data found";
                http_response_code(404);
                return array("payload" => $data, "message" => $err, "remarks" => "failed", "timestamp" => date_create());
            }
        } catch (\PDOException $e) {
            http_response_code(400);
            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }

    public function get_classes($classcode = null)
    {
        $sql = "SELECT * FROM classes_tbl WHERE isdeleted_fld=0";
        if ($classcode) {
            $sql .= " AND classcode_fld = '$classcode'";
        }
        $data = array();
        try {
            if ($result = $this->pdo->query($sql)->fetchAll()) {
                foreach ($result as $record) {
                    array_push($data, $record);
                }
                $result = null;
                http_response_code(200);
                return array("payload" => $data, "message" => "succesfully retrieved data", "remarks" => "success", "timestamp" => date_create());
            } else {
                $err = "No data found";
                http_response_code(404);
                return array("payload" => $data, "message" => $err, "remarks" => "failed", "timestamp" => date_create());
            }
        } catch (\PDOException $e) {
            http_response_code(400);
            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }

    public function get_subject($classcode = null)
    {
        $sql = "SELECT * FROM enrolledsubj_tbl WHERE isdeleted_fld=0";
        if ($classcode) {
            $sql .= " AND enrolledsubj_tbl = '$classcode'";
        }
        $data = array();
        try {
            if ($result = $this->pdo->query($sql)->fetchAll()) {
                foreach ($result as $record) {
                    array_push($data, $record);
                }
                $result = null;
                http_response_code(200);
                return array("payload" => $data, "message" => "succesfully retrieved data", "remarks" => "success", "timestamp" => date_create());
            } else {
                $err = "No data found";
                http_response_code(404);
                return array("payload" => $data, "message" => $err, "remarks" => "failed", "timestamp" => date_create());
            }
        } catch (\PDOException $e) {
            http_response_code(400);
            return array("payload" => null, "message" => $e->getMessage(), "remarks" => "failed", "timestamp" => date_create());
        }
    }
}
