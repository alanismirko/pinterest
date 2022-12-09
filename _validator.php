<?php

define('_USER_NAME_MIN_LEN', 2);
define('_USER_NAME_MAX_LEN', 20);
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
function _validate_image()
{
    if ($_FILES['item_image']['error'] === UPLOAD_ERR_INI_SIZE) {
        _respond('item_image too large', 400);
    }
    $item_image_temp_name = $_FILES["item_image"]["tmp_name"]; // C:\xampp\tmp\php791.tmp || C:\xampp\tmp\php5245.tmp
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // just reads the extension of the file
    $image_mime = mime_content_type($_FILES["img"]["tmp_name"]); // reads the mime inside the file
    $accepted_image_formats = ['image/png', 'image/jpeg'];
    if (!in_array($image_mime, $accepted_image_formats)) {
        http_response_code(400);
        echo 'image not allowed';
        exit();
    }
    $random_image_name = bin2hex(random_bytes(16));
    switch ($image_mime) {
        case 'image/png':
            $random_image_name .= '.png';
            break;
        case 'image/jpeg':
            $random_image_name .= '.jpeg';
            break;
    }

    if (move_uploaded_file($_FILES["img"]["tmp_name"], 'images/2.png')) {
        echo 'ok';
        exit();
    }
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