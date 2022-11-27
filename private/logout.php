<?php

require_once('./initialize.php');
require_once('db.php');

try{

    if (isset($_COOKIE['login'])) {
        $session_id = $_COOKIE["login"];
        $query_user = $db->prepare('DELETE  FROM sessions WHERE session_id=:session_id');
        $query_user->bindValue(':session_id', $session_id);
        $query_user->execute();
        unset($_COOKIE['login']); 
        header("location: ./login.php"); 
    } else {
        header('Location: ../public/pinterest/views/index.php');
    }
    
}catch(PDOException $ex){
    echo $ex;
}
