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
        case 'users':
            echo json_encode($get->get_users());
            break;
        break;
    case 'POST':
        switch($request[0]){
            case 'adduser':
                echo 'adduser endpoint';
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

