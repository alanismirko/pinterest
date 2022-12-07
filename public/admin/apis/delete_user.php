<?php

include_once('./././private/admin/users.php');

$users = new Users();
$url_id = explode("/",($_SERVER["REQUEST_URI"])); 

$user_id= $url_id[3];
$users->delete_user($user_id);

header('Location:/admin');



