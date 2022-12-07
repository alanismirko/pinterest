<?php
    include_once('./././private/admin/login_admin.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $login = new Login();

    if(isset($_POST['login'])){
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $authenticate = $login->check_login($email, $password);
        $session_id = $login->create_session($email);

        if(!$authenticate){
            header('location:/login-admin');
        }
        else{
            setcookie('login_admin', $session_id, time() + 60*60*24*30, '/');
            header('location:/admin');
        }
    }
    else{
        header('location:/login-admin');
    }