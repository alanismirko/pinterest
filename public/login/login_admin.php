
<?php 
require_once('././private/initialize.php'); 

require_once('_validator.php');

include(SHARED_PATH . '/header.php'); 
?>


<div id="login">
    <h1>Admin login</h1>

    <div id="admin-wrapper" class="info-wrapper">

        <img src="./public/static/assets/logo.svg">
        <h2>Welcome to Pinterest Admin</h2>


        <form action="/login-admin" method="POST">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Admin password">

            <input type="submit" name="login" value="Log in">
        </form>

        <?php if (isset($_SESSION["errorMessage"])) { ?>
        <div class="error-message"><?php  _out($_SESSION["errorMessage"]); ?></div>
        <?php unset($_SESSION["errorMessage"]);}?>
    </div>


</div>


<?php include(SHARED_PATH . '/footer.php'); ?>