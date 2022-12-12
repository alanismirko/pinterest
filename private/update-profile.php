<?php
require_once('initialize.php');
require_once('db.php');

try {
    $user_email_original = $_COOKIE['user_email'];
    $user_email = $_COOKIE['user_email'];
    $user_nickname_original = $_COOKIE['user_nickname'];
    $user_nickname = $_COOKIE['user_nickname'];

    $query_user = $db->prepare('SELECT * FROM users WHERE email=:user_email');
    $query_user->bindValue(':user_email', $user_email);
    $query_user->execute();
    $query_user = $query_user->fetchAll();
    $user_lastname = $query_user[0]['last_name'];
    $user_password_hashed = $query_user[0]['password'];


    //////////// If firstname is changed
    if (isset($_POST['user_firstname']) && ($_POST['user_firstname'] !== "")) {
        $user_firstname = $_POST['user_firstname'];
    }

    //////////// If lastname is changed
    if (isset($_POST['user_lastname']) && ($_POST['user_lastname'] !== "")) {
        $user_lastname = $_POST['user_lastname'];
    }

    //////////// If nickname is changed
    if (isset($_POST['user_nickname']) && ($_POST['user_nickname'] !== "")) {
        $user_nickname = $_POST['user_nickname'];
        unset($_COOKIE['user_nickname']);
        setcookie('user_nickname', $user_nickname, time() + 60 * 60 * 24 * 30, '/');
    }

    //////////// If email is changed
    if (isset($_POST['user_email']) && ($_POST['user_email'] !== "")) {
        $user_email = $_POST['user_email'];
        unset($_COOKIE['user_email']);
        setcookie('user_email', $user_email, time() + 60 * 60 * 24 * 30, '/');
    }

    //////////// If password is changed
    if (isset($_POST['user_password']) && ($_POST['user_password'] !== "")) {
        $user_password = $_POST['user_password'];
        $user_password_hashed = password_hash($user_password, PASSWORD_BCRYPT);
    }

    $query_user = $db->prepare('UPDATE users SET first_name=:first_name, last_name=:last_name, nick_name=:nick_name, email=:email, password=:password WHERE email=:email_original');
    $query_user->bindValue(':first_name', $user_firstname);
    $query_user->bindValue(':last_name', $user_lastname);
    $query_user->bindValue(':nick_name', $user_nickname);
    $query_user->bindValue(':email', $user_email);
    $query_user->bindValue(':password', $user_password_hashed);
    $query_user->bindValue(':email_original', $user_email_original);
    $query_user->execute();

    // header('Location: /' . $user_nickname . '/edit');
    header('Location: /' . $user_nickname . '/user-profile' );

} catch (PDOException $ex) {
    echo $ex;
}
