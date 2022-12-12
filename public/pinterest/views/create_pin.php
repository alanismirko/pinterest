<?php require_once('./././private/initialize.php'); ?>

<?php require_once(SHARED_PATH . '/header_pinterest.php'); ?>

<?php
if (!isset($_COOKIE["login"]))
    header("location: /login");
?>


<section class="post-container">
    <div class="post-wrapper">
        <form action="/create-post" method="post" enctype="multipart/form-data" data-steps="1" onsubmit="validate(); return false">
            <h3>Create a pin</h3>
            <div class="error-display">
                <p>Let's do it again - there are items that require your attention!</p>
            </div>

            <textarea rows="1" class="input-lg" type="text" name="title" placeholder="Add your title" data-validate="str" data-min="2" data-max="100"></textarea>
            <span class="error-message">
                    <p class="ml-2 text-xs">Minimum 2 characters.</p>
            </span>

            <label for="file">Upload your file</label>
            <input type="file" name="file" data-validate="img">
            <span class="error-message">
                    <p class="ml-2 text-xs">You did not upload the image or the file is not allowed</p>
            </span>

            <input type="submit" name="submit" value="Upload">
        </form>
    </div>

</section>


<?php include(SHARED_PATH . '/footer.php'); ?>