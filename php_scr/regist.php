<?php

include_once 'connection.php';
//Для вывода сообщений
$response = array();

if (isset($_POST['email']) and isset($_POST['login']) and isset($_POST['password'])) {
    //Регистрация пользователя
    $con = new DB_Connection();
    $con->connect();
    $em = $_POST['email'];
    $lo = $_POST['login'];
    $pas = $_POST['password'];
    if ($con->logUniq($lo)) {
        $res = $con->addNewUser($em, $lo, $pas);
        if ($res) {
            $response['message'] = 'true';
            //Костыль, чтобы был доступ к логину
            $ff = fopen('log.txt', 'w');
            fwrite($ff, $_POST['login']);
            fclose($ff);
        } else $response['message'] = 'can not add user';
    }
    //Создание таблицы задач нового пользователя
    $res = $con->crNewTableTasks($lo);
    if ($res) $response['message2'] = 'true';
    else $response['message2'] = 'can not create table of tasks';
}
echo json_encode($response);
