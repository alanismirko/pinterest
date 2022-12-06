<?php
require_once('initialize.php');
require_once('db.php');

try {
    $user_email = $_COOKIE['user_email'];

    $query_user = $db->prepare('DELETE FROM users WHERE email=:email');
    $query_user->bindValue(':email', $user_email);
    $query_user->execute();

    // header('Location: /' . $user_nickname . '/edit');
    header('Location: /logout');
} catch (PDOException $ex) {
    echo $ex;
}
