<?php require_once('./././private/initialize.php'); ?>
<?php require_once('./././private/db.php'); ?>

<?php require_once(SHARED_PATH . '/header_pinterest.php'); ?>

<?php

$url = substr($_SERVER['REQUEST_URI'], 1);
$user_nickname = $_COOKIE['user_nickname'];

echo $url;
echo '</br>';
echo $user_nickname;
if (!isset($_COOKIE["login"]))
    header("location: /login");
if ($url !== $user_nickname) {
    header("location: /404");
}
?>


<?php

try {
    $user_email = $_COOKIE['user_email'];
    $user_nickname = $_COOKIE['user_nickname'];
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
        <p class="userLetter"><?php _out($user_letter) ?></p>
        <div class="user-info-wrapper">
            <h3><?php _out($user_fullname) ?></h3>
            <p>@<?php _out($user_nickname) ?></p>
            <p>0 following</p>
            <button><a href="/<?php _out($user_nickname) ?>/edit-profile">Edit profile</a></button>

        </div>
    </div>

    <div>

        <div class="image-list-wrapper">
            <div class="image-container">

                <?php foreach ($posts as $post) { ?>
                    <div class="card">
                        <div class="overlay-container">
                            <form action="/delete-post" method="post">
                                <img src="public/static/uploads/<?= $post['image_ref'] ?>">
                                <input type="hidden" id="image_ref" name="image_ref" value="<?= $post['image_ref'] ?>">
                                <div class="overlay">
                                    <span class="icon-container">
                                        <!-- <a href="/delete-post"><img src="public/static/assets/bin.png" alt=""></a> -->
                                        <input type="image" src="public/static/assets/bin.png">
                                    </span>
                                </div>
                            </form>
                        </div>
                        <p><?= $post['image_title'] ?></p>
                    </div>
                <?php } ?>

            </div>
        </div>

    </div>

    <!-- images by user come here -->

</section>


<?php include(SHARED_PATH . '/footer.php'); ?>