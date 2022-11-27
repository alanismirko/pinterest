<?php

require_once('./initialize.php');
require_once('db.php');

try{

    if (isset($_COOKIE['login'])) {
        $session_id = $_COOKIE['login'];
        print_r($session_id);
        flush();
        try{
            $query_user = $db->prepare('DELETE FROM sessions WHERE session_id=:session_id');
            $query_user->bindValue(':session_id', $session_id);
            $query_user->execute();
        }catch(PDOException $ex){
            echo $ex;
        }
        unset($_COOKIE['login']); 
        header("location: ./login.php"); 
    } else {
        header('Location: ../public/pinterest/views/index.php');
    }
    
}catch(Exception $ex){
    echo $ex;
}
