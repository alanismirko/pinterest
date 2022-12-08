<?php
require_once('initialize.php');
require_once('db.php');

try {
    $user_email = $_COOKIE['user_email'];
    $user_nickname = $_COOKIE['user_nickname'];
   
    $image_ref = $_POST['image_ref'];

    $targetDir = "public/static/uploads/";
    unlink($targetDir . $image_ref);

    $query_image = $db->prepare('DELETE from images WHERE image_ref=:image_ref');
    $query_image->bindValue(':image_ref', $image_ref);
    $query_image->execute();

    header('Location: /' . $user_nickname);
    // header('Location: /userlogin');

} catch (PDOException $ex) {
    echo $ex;
}
