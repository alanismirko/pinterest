<?php
require_once('initialize.php');
require_once('db.php');

try{
    $session_id = rand();
    $email = $_POST['email'];
    $password_form = $_POST['password'];
    $current_date = date("Y-m-d");

    $query_user = $db->prepare('SELECT * FROM users WHERE email=:email');
    $query_user->bindValue(':email', $email);
    $query_user->execute();
    $user = $query_user->fetchAll();

}catch(PDOException $ex){
    echo $ex;
    echo '</br>';
    echo 'bitch';
}

try{
    if (password_verify($password_form, $user[0]['password'])){
        $query_session = $db->prepare('INSERT INTO sessions VALUES (:session_id, :session_user_email, :session_created_at)');
        $query_session->bindValue(':session_id', $session_id);
        $query_session->bindValue(':session_user_email', $email);
        $query_session->bindValue(':session_created_at', $current_date);
        $query_session->execute();
        setcookie('login', $session_id, time() + 60*60*24*30, '/');
        setcookie('user_email', $email);
        header('Location: /userlogin');
    }
    elseif($email == "admin@admin.com" and $password_form == "admin123" ){
        setcookie("login", "$session_id");
        header('Location: /admin');
    }
    else {
        header('Location: /login');
    }
}catch(Exception $e){
    echo $e;
}



