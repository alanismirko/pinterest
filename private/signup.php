<?php
require_once('initialize.php');
require_once('db.php');
require_once('_validator.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // to check if all input fields are filled
    if (count(array_filter($_POST)) == count($_POST)) {
        $id = rand();
        $session_id = rand();

        $user_email = _validate_user_email($_POST['user_email']);
        $user_password = _validate_user_password($_POST['user_password']);
        $user_firstname = _validate_user_name($_POST['user_firstname']);
        $user_lastname = _validate_user_name($_POST['user_lastname']);
        $user_nickname = _validate_user_name($_POST['user_nickname']);

        $user_password_hashed = password_hash($user_password, PASSWORD_BCRYPT);
        $user_dateofbirth = $_POST['user_dateofbirth'];
        $current_date = date("Y-m-d");

        $query_user = $db->prepare('INSERT INTO users VALUES(:user_id, :first_name, :last_name, :nick_name, :email, :password, :date_of_birth)');
        $query_user->bindValue(':user_id', $id);
        $query_user->bindValue(':first_name', $user_firstname);
        $query_user->bindValue(':last_name', $user_lastname);
        $query_user->bindValue(':nick_name', $user_nickname);
        $query_user->bindValue(':email', $user_email);
        $query_user->bindValue(':password', $user_password_hashed);
        $query_user->bindValue(':date_of_birth', $user_dateofbirth);
        $query_user->execute();

        header('Location: /login');
    } else {
        header('Location: /signup');
    }
} catch (PDOException $ex) {
    echo $ex;
}
