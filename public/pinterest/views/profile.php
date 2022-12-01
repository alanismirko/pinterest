<?php require_once('./././private/initialize.php'); ?>

<?php require_once(SHARED_PATH . '/header_pinterest.php'); ?>

<?php
if (!isset($_COOKIE["login"]))
    header("location: /login");
?>


<section class="profile-container">

    <div class="profile-header-wrapper">
        <p class="userLetter"><?php echo $user_letter ?></p>
        <div class="user-info-wrapper">
            <h3><?php echo $user_fullname ?></h3>
            <p>@<?php echo $user_nickname ?></p>
            <p>0 following</p>
            <button><a href="/<?php echo $user_nickname?>/edit-profile">Edit profile</a></button>

        </div>
    </div>

    <!-- images by user come here -->

</section>


<?php include(SHARED_PATH . '/footer.php'); ?>