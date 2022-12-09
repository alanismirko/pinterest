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




// function _validate_item_image(){
//     if($_FILES['item_image']['error'] === UPLOAD_ERR_INI_SIZE) {
//       _respond('item_image too large', 400);
//     }
//     $item_image_temp_name = $_FILES["item_image"]["tmp_name"]; // C:\xampp\tmp\php791.tmp || C:\xampp\tmp\php5245.tmp
//     $target_dir = "images/";
//     $target_file = $target_dir . basename($_FILES["img"]["name"]);
//     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // just reads the extension of the file
//     $image_mime = mime_content_type($_FILES["img"]["tmp_name"]); // reads the mime inside the file
//     $accepted_image_formats = ['image/png', 'image/jpeg'];
//     if( ! in_array($image_mime, $accepted_image_formats) ){
//       http_response_code(400);
//       echo 'image not allowed';
//       exit();
//     }
//     $random_image_name = bin2hex(random_bytes(16));
//     switch($image_mime){
//       case 'image/png':
//         $random_image_name .= '.png';
//       break;
//       case 'image/jpeg':
//         $random_image_name .= '.jpeg';
//       break;
//     }
  
//     if(move_uploaded_file($_FILES["img"]["tmp_name"], 'images/2.png')){
//       echo 'ok';
//       exit();
//     }  
//   }