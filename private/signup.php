<?php
require_once('initialize.php');
require_once('db.php');

try{
    $id = rand();
    $session_id = rand();
    $email = $_POST['email'];
    $password_form = $_POST['password'];
    $password = password_hash($password_form, PASSWORD_BCRYPT);
    $date_of_birth = $_POST['age'];
    $current_date = date("Y-m-d");
    
    $query_user = $db->prepare('INSERT INTO users VALUES(:id, :email, :password, :date_of_birth)');
    $query_user->bindValue(':id', $id);
    $query_user->bindValue(':email', $email);
    $query_user->bindValue(':password', $password);
    $query_user->bindValue(':date_of_birth', $date_of_birth);
    $query_user->execute();


    header('Location: /login');

}catch(PDOException $ex){
    echo $ex;
}



