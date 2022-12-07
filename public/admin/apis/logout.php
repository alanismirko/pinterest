<?php
    include_once('./././private/admin/logout_admin.php');

    $logout = new Logout();

    try{
        if (isset($_COOKIE['login'])) {
            $session_id = $_COOKIE['login'];
            try{
                $logout->logout($session_id);
            }catch(PDOException $ex){
                echo $ex;
            }
            unset($_COOKIE['login']); 
            setcookie("login", "", time()-3600);
            header("location: /login-admin"); 
        } else {
            header('Location: /admin');
        }
        
    }catch(Exception $ex){
        echo $ex;
    }




