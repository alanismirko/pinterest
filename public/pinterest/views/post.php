<?php require_once('./././private/initialize.php'); ?>

<?php require_once(SHARED_PATH . '/header_pinterest.php'); ?>

<?php
if (!isset($_COOKIE["login"]))
    header("location: /login");
?>


<section class="post-container">
    <h1>CREATE POST </h1>

    <div class="post-wrapper">
        <p>text</p>

        <form action="/create-post" method="post" enctype="multipart/form-data">
            Select Image File to Upload:

            <label for="file">Upload your file</label>
            <input type="file" name="file">

            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Add your title">

            <input type="submit" name="submit" value="Upload">
        </form>


    </div>

</section>


<?php include(SHARED_PATH . '/footer.php'); ?>