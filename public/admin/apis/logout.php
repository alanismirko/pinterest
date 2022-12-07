<?php
    include_once('./././private/admin/logout_admin.php');

    $logout = new Logout();

    try{
        if (isset($_COOKIE['login_admin'])) {
            $session_id = $_COOKIE['login_admin'];
            try{
                $logout->logout($session_id);
            }catch(PDOException $ex){
                print_r($ex) ;
            }
            unset($_COOKIE['login_admin']); 
            setcookie("login_admin", "", time()-3600);
            header("location: /login-admin"); 
        } else {
            header('Location: /admin');
        }
        
    }catch(Exception $ex){
        print_r($ex);
    }




