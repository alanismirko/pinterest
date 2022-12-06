<?php
    session_start();



    include_once('./././private/admin/login_admin.php');

    $login = new Login();

    if(isset($_POST['login'])){
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $authenticate = $login->check_login($email, $password);



        if(!$authenticate){
            header('location:/login-admin');
        }
        else{
            $_SESSION['user'] = $authenticate;

            header('location:/admin');
        }



    }
    else{
        header('location:/login-admin');
    }