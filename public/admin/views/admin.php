<?php
    session_start();
    if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
        header('location: /login-admin');

    }
?>
<h1>Admin </h1>