<?php
require_once('initialize.php');
require_once('db.php');
require_once('_validator.php');

try {
    $session_id = rand();
    $email = _validate_user_email($_POST['email']);
    $password_form = _validate_user_password($_POST['password']);
    $current_date = date("Y-m-d");

    $query_user = $db->prepare('SELECT * FROM users WHERE email=:email');
    $query_user->bindValue(':email', $email);
    $query_user->execute();
    $user = $query_user->fetchAll();
    $user_id = $user[0]['user_id'];
} catch (PDOException $ex) {
    echo $ex;
}


try {
    if (password_verify($password_form, $user[0]['password'])) {
        $query_session = $db->prepare('INSERT INTO sessions VALUES (:session_id, :session_user_id, :session_created_at)');
        $query_session->bindValue(':session_id', $session_id);
        $query_session->bindValue(':session_user_id', $user_id);
        $query_session->bindValue(':session_created_at', $current_date);
        $query_session->execute();

        setcookie('login', $session_id, time() + 60 * 60 * 24 * 30, '/');
        setcookie('user_email', $email, time() + 60 * 60 * 24 * 30, '/');
        setcookie('user_nickname', $user[0]['nick_name'], time() + 60 * 60 * 24 * 30, '/');

        header('Location: /home');
    } else {
        header('Location: /login');
    }
    // }
} catch (Exception $e) {
    echo $e;
}
    //
