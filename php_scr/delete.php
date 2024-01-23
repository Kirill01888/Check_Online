<?php
include_once 'connection.php';
//Для вывода сообщений
$response = array();

if(isset($_POST['login']) and isset($_POST['text_of_task'])){
    //Удаление задач пользователя
    $con = new DB_Connection();
    $con -> connect();
    if($con->del_task($_POST['login'], $_POST['text_of_task'])){
        $response['message'] = 'deleted';
    }else{
        $response['message'] = 'do not deleted';
    }
    
}
echo json_encode($response);
?>