
<?php require_once('./././private/initialize.php'); ?>

<?php require_once(SHARED_PATH . '/header_pinterest.php'); ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_COOKIE["login"]))
    header("location: /login");
?>


<div class="image-list-wrapper">
    <div class="image-container">
        <div class="card">
            <img src="./public/static/assets/list/image1.svg" alt="">
            <p>Abstract</p>
            <p><?php echo $_COOKIE['user_nickname'] ?></p>
            <p><?php echo $_COOKIE['user_email'] ?></p>
        </div>

        <div class="card">
            <img src="./public/static/assets/list/image7.svg" alt="">
            <p>Astronout in the space</p>
        </div>

        <div class="card">
            <img src="./public/static/assets/list/image2.svg" alt="">
            <p>Flowers in the vase</p>
        </div>

        <div class="card">
            <img src="./public/static/assets/list/image3.svg" alt="">
            <p>Look into the future</p>
        </div>

        <div class="card">
            <img src="./public/static/assets/list/image8.svg" alt="">
            <p>Walk in the forest</p>
        </div>

        <div class="card">
            <img src="./public/static/assets/list/image4.svg" alt="">
            <p>Drop of the rain</p>
        </div>

        <div class="card">
            <img src="./public/static/assets/list/image5.svg" alt="">
            <p>Sky view</p>
        </div>

        <div class="card">
            <img src="./public/static/assets/list/image6.svg" alt="">
            <p>Fish drawing</p>
        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>