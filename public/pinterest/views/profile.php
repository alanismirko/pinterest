<?php require_once('./././private/initialize.php'); ?>
<?php require_once('./././private/db.php'); ?>

<?php require_once(SHARED_PATH . '/header_pinterest.php'); ?>

<?php
if (!isset($_COOKIE["login"]))
    header("location: /login");
?>

<?php

try {
    $user_email = $_COOKIE['user_email'];
    $query_post = $db->prepare('SELECT * FROM images WHERE image_user_email=:image_user_email');
    $query_post->bindValue(':image_user_email', $user_email);
    $query_post->execute();
    $posts = $query_post->fetchAll();
} catch (PDOException $ex) {
    echo $ex;
} 

?>


<section class="profile-container">

    <div class="profile-header-wrapper">
        <p class="userLetter"><?php echo $user_letter ?></p>
        <div class="user-info-wrapper">
            <h3><?php echo $user_fullname ?></h3>
            <p>@<?php echo $user_nickname ?></p>
            <p>0 following</p>
            <button><a href="/<?php echo $user_nickname ?>/edit-profile">Edit profile</a></button>

        </div>
    </div>

    <div>
        <p>Created</p>

        <div>

            <?php foreach ($posts as $post) { ?>
                <div class="post">
                    <p><?= $post['image_title'] ?></p>
                    <img src="public/static/uploads/<?= $post['image_ref'] ?>">
                </div>
            <?php } ?>

        </div>
    </div>

    <!-- images by user come here -->

</section>


<?php include(SHARED_PATH . '/footer.php'); ?>