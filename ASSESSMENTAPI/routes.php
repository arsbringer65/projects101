<?php

require_once("./config/Connection.php");
require_once("./module/Post.php");
require_once("./module/Get.php");


$db = new Connection();
$pdo = $db->connect();
$post = new Post($pdo);
$get = new Get($pdo);


if (isset($_REQUEST['request'])) {
    $req = explode('/', rtrim($_REQUEST['request'], '/'));
} else {
    $req = array("errorcatcher");
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $d = json_decode(file_get_contents("php://input"));
        switch ($req[0]) {
            case 'adduser':
                echo json_encode($post->add_user($d));
                break;

            case 'updateuser':
                echo json_encode($post->update_user($d, $req[1]));
                break;

            case 'deleteuser':
                echo json_encode($post->delete_user($d, $req[1]));
                break;

            case 'getuser':
                if (count($req) > 1) {
                    echo json_encode($get->get_user($req[1]));
                } else {
                    echo json_encode($get->get_user());
                }
                break;


            case 'login':
                echo json_encode($post->login($d));
                break;
            case 'addclasses':
                echo json_encode($post->add_classes($d));
                break;
            case 'updateclasses':
                echo json_encode($post->update_classes($d, $req[1]));
                break;
            case 'deleteclasses':
                echo json_encode($post->delete_classes($d, $req[1]));
                break;
            case 'getclasses':
                if (count($req) > 1) {
                    echo json_encode($get->get_classes($req[1]));
                } else {
                    echo json_encode($get->get_classes());
                }
                break;


            case 'addsubject':
                echo json_encode($post->add_subject($d));
                break;
            case 'updatesubject':
                echo json_encode($post->update_subject($d, $req[1]));
                break;
            case 'deletesubject':
                echo json_encode($post->delete_subject($d, $req[1]));
                break;
            case 'getsubject':
                if (count($req) > 1) {
                    echo json_encode($get->get_classes($req[1]));
                } else {
                    echo json_encode($get->get_classes());
                }
                break;

            default:
                break;
        }

        break;

    default:
        break;
}
