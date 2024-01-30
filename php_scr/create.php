<?php

include_once 'connection.php';
$response = array();

if(isset($_POST['login']) and isset($_POST['text_for_task'])){
    $con = new DB_Connection();
    $con -> connect();
    $res = $con->create_task($_POST['login'], $_POST['text_for_task']);
    if($res){
        $response['message'] = 'success';
    }else{
        $response['message'] = 'can not create task';
    }
}else{
    $response['message'] = 'some thing gone wrong';
}

echo json_encode($response);
?>