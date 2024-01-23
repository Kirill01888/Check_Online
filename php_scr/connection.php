<?php

class DB_Connection
{
    private $con_db;
    //База данных - users_data, таблица - users
    function __construct(){}
    //Создание подключения к базе данных
    function connect()
    {
        $this->con_db = pg_connect("host=check-online.com dbname=users_data user=postgres password=postgres");
        return $this->con_db;
    }
    //Проверка логина на уникальность
    function logUniq($login)
    {
        pg_prepare($this->con_db, 'is_uniq', 'select id from users where login = $1');
        $returned = pg_execute($this->con_db, 'is_uniq', array($login));
        $returned = pg_fetch_all($returned);
        if (count($returned) == 1) {
            return false;
        }
        return true;
    }
    //Проверка, есть ли пользователь в таблице
    function isInTable($login, $password)
    {
        pg_prepare($this->con_db, 'is_in_or_not', 'select id from users where login = $1 and password = $2');
        $returned = pg_execute($this->con_db, 'is_in_or_not', array($login, $password));
        $returned = pg_fetch_all($returned);
        if (count($returned) == 1) {
            return true;
        }
        return false;
    }
    //Добавление нового пользователя при регистрации
    function addNewUser($email, $login, $password){
        pg_prepare($this->con_db, 'add_new_user', 'insert into users(email, login, password) values($1,$2,$3)');
        $res = pg_execute($this->con_db, 'add_new_user', array($email, $login, $password));
        if($res){
            return true;
        }
        return false;
    }
    //Создание для нового пользователя таблицы с его задачами. Имя таблицы = логин пользователя
    function crNewTableTasks($login)
    {
        $res = pg_query($this->con_db, 'create table '.$login.'(id serial primary key, task_text character(70), checked boolean)');
        if ($res) {
            return true;
        }
        return false;
    }
    //Получение задач пользователя
    function getTasks($login)
    {
        $returned = pg_query($this->con_db, "select task_text, checked from ".$login."");
        $arr_res = pg_fetch_all($returned);
        return $arr_res;
    }
    //удаление задачи
    function del_task($login, $text_of_task){
        $res = pg_query($this->con_db, "delete from ".$login." where task_text = '".$text_of_task."'");
        if ($res){
            return true;
        }
        return false;
    }
}
?>

