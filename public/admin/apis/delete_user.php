<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('./././private/admin/users.php');

$users = new Users();
echo $_GET['user_id'];

if(!isset($_GET['user_id']) ){
    $user_id= $_GET['user_id'];
    $users->delete_user($user_id);

}


