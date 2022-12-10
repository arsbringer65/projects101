<?php
require_once './inc/conn.php';
require_once './models/get.php';
require_once './models/post.php';
require_once './models/global.php';
require_once './models/delete.php';
require_once './models/update.php';
$db = new Connection();
$pdo = $db->connect();
$get = new Get($pdo);
$post = new Post($pdo);
$delete = new Delete($pdo);
$update = new Update($pdo);
$gm = new GlobalMethod($pdo);

if(isset($_REQUEST['request'])){
    $request = explode('/', $_REQUEST['request']);
}else{
    http_response_code(404);
}

switch($_SERVER['REQUEST_METHOD']){
    // Get Requests
    case 'GET':
        switch($request[0]){
            case 'admin':
                if(count($request)>1){
                    echo json_encode($get->get_admin($request[1]));
                }else{
                    echo json_encode($get->get_admin());
                }
            
                break;

            case 'schedule':
                if(count($request)>1){
                    echo json_encode($get->get_sched($request[1]));
                }else{
                    echo json_encode($get->get_sched());
                }
                break;

            case 'news':
                if(count($request)>1){
                    echo json_encode($get->get_news($request[1]));
                }else{
                    echo json_encode($get->get_news());
                }
            
                break;
            default:
            break;
        
        }
            
    break;

    // POST Requests
    
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        switch($request[0]){
            case 'addadmin':
                echo json_encode($post->add_admin($data));
                break;
            case 'addsched':
                echo json_encode($post->add_sched($data));
                break;
            case 'login':
                echo json_encode($post->login($data));
                break;
            case 'addnews':
                echo json_encode($post->add_news($data));
                break;
            // case 'archiveuser':
            //     echo json_encode($update->archived_user($data));
            //     break;
            default:
            break;
        }
    break;

    case 'DELETE':
        switch($request[0]){
            case 'deleteuser':
                echo json_encode($delete->delete_user($request[1]));
            break;
            case 'deletequeue':
                echo json_encode($delete->delete_queue($request[1]));
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
    http_response_code(403);
    break;
}

