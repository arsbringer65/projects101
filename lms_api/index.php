<?php
require_once './inc/conn.php';
require_once './models/get.php';
require_once './models/post.php';
require_once './models/delete.php';
require_once './models/global.php';
$db = new Connection();
$pdo = $db->connect();
$get = new Get($pdo);
$post = new Post($pdo);
$delete = new Delete($pdo);
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
            case 'employees':
                if(count($request)>1){
                    echo json_encode($get->get_employees($request[1]));
                }else{
                    echo json_encode($get->get_employees());
                }
            
                break;

            case 'requests':
                if(count($request)>1){
                    echo json_encode($get->get_request($request[1]));
                }else{
                    echo json_encode($get->get_request());
                }
            
                break;

            case 'admins':
                if(count($request)>1){
                    echo json_encode($get->get_admin($request[1]));
                }else{
                    echo json_encode($get->get_admin());
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
            case 'addemployee':
                // echo 'adduser endpoint';
                echo json_encode($post->add_employee($data));
                break;
            case 'addrequest':
                // echo 'adduser endpoint';
                echo json_encode($post->add_request($data));
                break;
            case 'login':
                echo json_encode($post->login($data));
                // echo 'login endpoint';
                break;
            case 'approved':
                echo json_encode($post->approve_request($data, $request[1]));
                // echo 'login endpoint';
                break;
            case 'editrequest':
                echo json_encode($post->edit_request($data, $request[1]));
                // echo 'login endpoint';
                break;
            case 'addadmin':
                echo json_encode($post->add_admin($data));
                // echo 'login endpoint';
                break;
                
            default:
            break;
        }
    break;

    case 'DELETE':
        switch($request[0]){
            case 'deleteemployee':
                echo json_encode($delete->delete_employee($request[1]));
            break;

            case 'deleteadmin':
                echo json_encode($delete->delete_admin($request[1]));
            break;

            case 'deleterequest':
                echo json_encode($delete->delete_employee($request[1]));
            break;
            // case 'deletequeu':
            //     echo json_encode($post->delete_request($request[1]));
            // break;
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

