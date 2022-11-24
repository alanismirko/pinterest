<?php

try{
    $db_host = "localhost";
    $db_name = "pinterest_php";
    $db_user = "root";
    $db_pass = "1234";
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOeXCEPTION $ex){
    echo $ex;
}



