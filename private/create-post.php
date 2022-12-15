<?php
require_once('initialize.php');
require_once('db.php');
require_once('_validator.php');

try {
    if (count(array_filter($_POST)) == count($_POST)) {
        $user_email = $_COOKIE['user_email'];
        $user_nickname = $_COOKIE['user_nickname'];
        $image_id = rand();
        $image_title =  _validate_image_title($_POST['title']);
        $created_at = date('Y-m-d h:i:s');
    
        // File upload path
        $image_ref = _validate_image($_FILES["file"]["name"]);

        $query_image = $db->prepare('INSERT into images VALUES (:image_id, :image_title, :image_ref, :image_user_email, :created_at)');
        $query_image->bindValue(':image_id', $image_id);
        $query_image->bindValue(':image_title', $image_title);
        $query_image->bindValue(':image_ref', $image_ref);
        $query_image->bindValue(':image_user_email', $user_email);
        $query_image->bindValue(':created_at', $created_at);
        $query_image->execute();
    
        header('Location: /' . $user_nickname . '/user-profile' );
    }
    else{
        header('Location: /pin-builder' );
    }


} catch (PDOException $ex) {
    echo $ex;
}
