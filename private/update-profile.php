<?php
require_once('initialize.php');
require_once('db.php');

try {
    $user_email_original = $_COOKIE['user_email'];

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_dateofbirth = $_POST['user_dateofbirth'];
    $user_nickname = $_POST['user_nickname'];

    $user_password_hashed = password_hash($user_password, PASSWORD_BCRYPT);

    $query_user = $db->prepare('UPDATE users SET first_name=:first_name, last_name=:last_name, nick_name=:nick_name, email=:email, password=:password WHERE email=:email_original');
    $query_user->bindValue(':first_name', $user_firstname);
    $query_user->bindValue(':last_name', $user_lastname);
    $query_user->bindValue(':nick_name', $user_nickname);
    $query_user->bindValue(':email', $user_email);
    $query_user->bindValue(':email_original', $user_email_original);
    $query_user->bindValue(':password', $user_password_hashed);
    $query_user->execute();

    // header('Location: /' . $user_nickname . '/edit');
    header('Location: /' . $user_nickname . '/user-profile/' );
} catch (PDOException $ex) {
    echo $ex;
}
