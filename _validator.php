<?php

define('_USER_NAME_MIN_LEN', 2);
define('_USER_NAME_MAX_LEN', 20);
define('_IMG_TITLE_MIN_LEN', 2);
define('_IMG_TITLE_MAX_LEN', 100);
define('_USER_LAST_NAME_MIN_LEN', 2);
define('_USER_LAST_NAME_MAX_LEN', 20);
define('_USER_PASSWORD_MIN_LEN', 6);
define('_USER_PASSWORD_MAX_LEN', 100);
define('_REGEX_EMAIL', '^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$');

define('_ITEM_NAME_MIN_LEN', 2);
define('_ITEM_NAME_MAX_LEN', 20);
define('_ITEM_PRICE_REGEX', '^[1-9][0-9]*\.[0-9]{2}$');
define('_ITEM_KEY_REGEX', '^[0-9]+$');

// ##############################
function _out($text)
{
    echo htmlspecialchars($text);
}

// ##############################
function _validate_user_name($user_name)
{
    $error_message = 'user_firstname ' . _USER_NAME_MIN_LEN . ' to ' . _USER_NAME_MAX_LEN . ' characters';
    $user_name = trim($user_name);

    if (!isset($user_name)) {
        _respond($error_message, 400);
    }
    if (strlen($user_name) < _USER_NAME_MIN_LEN) {
        _respond($error_message);
    }
    if (strlen($user_name) > _USER_NAME_MAX_LEN) {
        _respond($error_message);
    }
    return $user_name;
}

// ##############################
function _validate_user_password($user_password)
{
    $error_message = 'user_password ' . _USER_PASSWORD_MIN_LEN . ' to ' . _USER_PASSWORD_MAX_LEN . ' characters';
    if (!isset($user_password)) {
        _respond($error_message, 400);
    }
    $user_password = trim($user_password);
    if (strlen($user_password) < _USER_PASSWORD_MIN_LEN) {
        _respond($error_message);
    }
    if (strlen($user_password) > _USER_PASSWORD_MAX_LEN) {
        _respond($error_message);
    }
    return $user_password;
}

// ##############################
function _validate_user_email($user_email)
{
    $error_message = 'user_email invalid';
    if (!isset($user_email)) {
        _respond($error_message, 400);
    }
    $user_email = trim($user_email);
    if (!preg_match('/' . _REGEX_EMAIL . '/', $user_email)) {
        _respond($error_message, 400);
    }
    return $user_email;
}



// ##############################
function _validate_image($file)
{   

    $error_message = 'image title not allowed or it was not uploaded';
    $fileName = basename($file);
    $image_id = rand();
    $target_dir = "public/static/uploads/";
    $targetFilePath = $target_dir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $image_ref = $image_id . '.' . $fileType;
     // reads the mime inside the file
    $accepted_image_formats = ['png', 'jpeg', 'jpg'];

    if (!in_array($fileType, $accepted_image_formats)) {
        http_response_code(400);
        _respond($error_message);
    }

    $targetDir = $target_dir;
    $image_ref = $image_ref;
    $upload = move_uploaded_file($_FILES["file"]["tmp_name"], $targetDir . $image_ref);

    if($upload){
        return $image_ref;
    }
    else{
        _respond($error_message);
    }
    

}

// ##############################
function _validate_image_title($image_title)
{
    $error_message = 'image title ' . _IMG_TITLE_MIN_LEN . ' to ' . _IMG_TITLE_MAX_LEN . ' characters';
    $image_title = trim($image_title);

    if (!isset($image_title)) {
        _respond($error_message, 400);
    }
    if (strlen($image_title) < _IMG_TITLE_MIN_LEN) {
        _respond($error_message);
    }
    if (strlen($image_title) > _IMG_TITLE_MAX_LEN) {
        _respond($error_message);
    }
    return $image_title;
}


// ##############################
function _respond($message = '', $status = 200)
{
    http_response_code($status);
    header('Content-Type: application/json');
    $res = is_array($message) ? $message : ['info' => $message];
    echo json_encode($res);
    exit();
}
