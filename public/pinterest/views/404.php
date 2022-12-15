<?php require_once('./././private/initialize.php'); ?>

<?php
if (isset($_COOKIE["login"])) {
    require_once(SHARED_PATH . '/header_pinterest.php');
} else {
    require_once(SHARED_PATH . '/header.php');
}
?>

<section class="profile-container">
    <h2>
        404 NOT FOUND
    </h2>
</section>

<?php include(SHARED_PATH . '/footer.php'); ?>