<?php

require_once('initialize.php');
require_once('db.php');

try{

    if (isset($_COOKIE['login'])) {
        $session_id = $_COOKIE['login'];
        try{
            $query_user = $db->prepare('DELETE FROM sessions WHERE session_id=:session_id');
            $query_user->bindValue(':session_id', $session_id);
            $query_user->execute();
        }catch(PDOException $ex){
            echo $ex;
        }
        unset($_COOKIE['login']); 
        header("location: /login"); 
    } else {
        header('Location: /home');
    }
    
}catch(Exception $ex){
    echo $ex;
}
