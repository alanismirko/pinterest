<?php
require_once('initialize.php');
require_once('db.php');

try{
    $id = rand();
    $session_id = rand();

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_password_hashed = password_hash($user_password, PASSWORD_BCRYPT);
    $user_dateofbirth = $_POST['user_dateofbirth'];
    $user_nickname = $_POST['user_nickname'];
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

}catch(PDOException $ex){
    echo $ex;
}



