<?php

require_once('././private/initialize.php');
require_once('././private/db.php');
require_once('_validator.php');
// require_once (PRIVATE_PATH . '/db.php');

$session_id = $_COOKIE['login'];

// WORKS - get user email - just to try JOIN, otherwise it's saved in cookie
$query_user = $db->prepare('SELECT * FROM sessions JOIN users WHERE session_id=:session_id AND session_user_email=email');
$query_user->bindValue(':session_id', $session_id);
$query_user->execute();
$query_user = $query_user->fetchAll();
$user_fullname = $query_user[0]['first_name'] . ' ' . $query_user[0]['last_name'];
$user_nickname = $query_user[0]['nick_name'];
$user_email = $query_user[0]['email'];
$user_dateofbirth = $query_user[0]['date_of_birth'];
$user_letter = ucfirst(substr($user_nickname, 0, 1));

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/static/style/css/style.css">
    <link rel="icon" href="https://s.pinimg.com/webapp/favicon-54a5b2af.png">

    <script src="/public/pinterest/js/script.js" defer></script>
    <script src="/public/pinterest/js/validator.js" defer></script>

    <title>Pinterest</title>
</head>

<body>

    <nav>
        <!-- <img class="logo-round" src="./public/static/assets/logo.svg" alt="Logo"> -->
        <a href="/home"><img class="logo-round" src="/public/static/assets/logo.svg" alt="Logo"></a>
        <form action="">
            <img src="/public/static/assets/search_icon.svg" alt="">
            <input type="search" placeholder="Search">
        </form>

        <div class="dropdown-wrapper">
            <a href="/pin-builder">
                <img class="round" src="/public/static/assets/create.svg" alt="">
            </a>


            <div id="dropdownButton">
                <img src="/public/static/assets/dropwdown.svg" alt="">
                <div id="dropdownModal">

                    <p>Currently in</p>

                    <a href="/<?php _out($user_nickname) ?>/user-profile">
                        <div class="profile-link-wrapper">
                            <p class="userLetter"><?php _out($user_letter) ?></p>
                            <div class="user-info-wrapper">
                                <p><strong><?php _out($user_fullname) ?></strong></p>
                                <p>@<?php _out($user_nickname) ?></p>
                                <p>Personal</p>
                                <p><?php _out($user_email) ?></p>
                            </div>
                        </div>
                    </a>

                    <p>Your accounts</p>
                    <a href="#">Add account</a>
                    <a href="#">Convert to business</a>

                    <p>More options</p>
                    <a href="#">Settings</a>
                    <a href="https://help.pinterest.com/en?source=gear_menu_web">Get help</a>
                    <a href="https://policy.pinterest.com/en/terms-of-service">See terms of service</a>
                    <a href="https://policy.pinterest.com/en/privacy-policy">See privacy policy</a>
                    <a href="/logout">Logout</a>
                </div>
            </div>

        </div>



    </nav>