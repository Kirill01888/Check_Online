<?php

include_once 'connection.php';

$response = array();

if (isset($_POST['login']) and isset($_POST['password'])) {
    $con = new DB_Connection();
    $con->connect();
    $back = $con->isInTable($_POST['login'], $_POST['password']);
    if ($back) {
        $response['message'] = 'true';
        //Костыль, чтобы был доступ к логину
        $ff = fopen('log.txt', 'w');
        fwrite($ff, $_POST['login']);
        fclose($ff);
    } else $response['message'] = 'wrong login or password';
} else {
    $response['message'] = 'some data was not set';
}
echo json_encode($response);
