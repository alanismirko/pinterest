<?php
require_once('initialize.php');
require_once('db.php');

try {
    $user_email = $_COOKIE['user_email'];
    $user_nickname = $_COOKIE['user_nickname'];
    $image_id = rand();
    $image_title = $_POST['title'];
    $created_at = date('Y-m-d h:i:s');

    // File upload path
    $targetDir = "public/static/uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $image_ref = $image_id . '.' . $fileType;
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetDir . $image_ref);

    $query_image = $db->prepare('INSERT into images VALUES (:image_id, :image_title, :image_ref, :image_user_email, :created_at)');
    $query_image->bindValue(':image_id', $image_id);
    $query_image->bindValue(':image_title', $image_title);
    $query_image->bindValue(':image_ref', $image_ref);
    $query_image->bindValue(':image_user_email', $user_email);
    $query_image->bindValue(':created_at', $created_at);
    $query_image->execute();

    header('Location: /' . $user_nickname);

} catch (PDOException $ex) {
    echo $ex;
}
