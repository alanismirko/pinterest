<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/static/style/css/style.css">
    <link rel="icon" href="https://s.pinimg.com/webapp/favicon-54a5b2af.png">

    <script src="./public/pinterest/js/script.js" defer></script>

    <title>Pinterest</title>
</head>
<body>

<nav>
    <img class="logo-round" src="./public/static/assets/logo.svg" alt="Logo">
    <form  action="">
        <img src="./public/static/assets/search_icon.svg" alt="">
        <input  type="search" placeholder="Search">
    </form>

    <div class="dropdown-wrapper">
        <a href="#">
            <img class="round" src="./public/static/assets/create.svg" alt="">
        </a>


        <div id="dropdownButton">
            <img  src="./public/static/assets/dropwdown.svg" alt="">
            <div id="dropdownModal">

                <p>Currently in</p>
                <div class="profile-link-wrapper">
                    <p class="userLetter">I</p>
                    <div class="user-info-wrapper">
                        <p><strong>Username</strong></p>
                        <p>Personal</p>
                        <p>email</p>
                    </div>
                </div>

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


    
