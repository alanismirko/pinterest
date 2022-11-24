<?php
require_once('./initialize.php');
require_once('db.php');

try{
    $id = 123;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = 12;
    

    $query = $db->prepare('INSERT INTO users VALUES(:id, :email, :password, :age)');
    $query->bindValue(':id', $id);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    $query->bindValue(':age', $age);
    $query->execute();
}catch(PDOException $ex){
    echo $ex;
}



