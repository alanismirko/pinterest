<?php require_once('./././private/initialize.php'); ?>

<?php require_once(SHARED_PATH . '/header_pinterest.php'); ?>

<?php
if (!isset($_COOKIE["login"]))
    header("location: /login");
?>


<section class="post-container">
    <!-- <h1> fea</h1> -->
    <div class="post-wrapper">
        <form action="/create-post" method="post" enctype="multipart/form-data">
            <h3>Create a pin</h3>

            <textarea rows="1" class="input-lg" type="text" name="title" placeholder="Add your title"></textarea>

            <label for="file">Upload your file</label>
            <input type="file" name="file">

            <input type="submit" name="submit" value="Upload">
        </form>
    </div>

</section>


<?php include(SHARED_PATH . '/footer.php'); ?>