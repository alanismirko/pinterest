<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('./././private/admin/users.php');

$users = new Users();
$url_id = explode("/",($_SERVER["REQUEST_URI"])); 

$user_id= $url_id[3];
$users->delete_user($user_id);

header('Location:/admin');



