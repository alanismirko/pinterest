<?php
    session_start();

    include_once('./././private/admin/login_admin.php');

    $login = new Login();

    if(isset($_POST['login'])){
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $login->check_login($email, $password);
        $_SESSION['user'] = 'admin';
        header('location:/admin');
    }
    else{
        header('location:/login-admin');
    }