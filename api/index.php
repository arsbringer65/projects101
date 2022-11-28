<?php
require_once './inc/conn.php';
require_once './models/get.php';
require_once './models/post.php';
require_once './models/global.php';
$db = new Connection();
$pdo = $db->connect();
$get = new Get($pdo);
$post = new Post($pdo);
$gm = new GlobalMethod($pdo);

if(isset($_REQUEST['request'])){
    $request = explode('/', $_REQUEST['request']);
}else{
    http_response_code(404);
}

switch($_SERVER['REQUEST_METHOD']){
    // Get Requests
    case 'GET':
        switch($request[0]){}
            case 'users':
                if(count($request)>1){
                    echo json_encode($get->get_users($request[1]));
                }else{
                    echo json_encode($get->get_users());
                }
            
            break;
    break;

    // POST Requests
    
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        switch($request[0]){
            case 'adduser':
                // echo 'adduser endpoint';
                echo json_encode($post->add_user($data));
                break;
            case 'login':
                echo 'login endpoint';
                break;
            default:
            break;
        }
    break;


    case 'PUT':
        echo 'this is PUT request';
        break;
    case 'PATCH':
        echo 'this is PATCH request';
        break;
    default:
    break;
}

