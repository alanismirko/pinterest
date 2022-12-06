<?php require_once('./././private/initialize.php'); ?>

<?php require_once(SHARED_PATH . '/header_pinterest.php'); ?>

<?php
if (!isset($_COOKIE["login"]))
    header("location: /login");
?>


<h1>
    404 NOT FOUND
</h1>