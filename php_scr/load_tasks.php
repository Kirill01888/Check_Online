<?php

include_once 'connection.php';
//Для вывода сообщений
$response = array();

if (isset($_POST['login'])){
    $con = new DB_Connection();
    $con -> connect();
    //Запись в response массива задач пользователя
    $response['message'] = $con->getTasks($_POST['login']);
}else{
    $response['message'] = 'can not get list of tasks';
}

echo json_encode($response);

?>