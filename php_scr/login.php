<?php

include_once 'connection.php';

$response = array();

if(isset($_POST['login']) and isset($_POST['password'])){
    $con = new DB_Connection();
    $con -> connect();
    $back = $con -> isInTable($_POST['login'], $_POST['password']);
    if($back) $response['message'] = 'true';
    else $response['message'] = 'wrong login or password';
}
echo json_encode($response);
// $response['message'] = 'login is already using';
?>