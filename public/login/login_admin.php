
<?php require_once('././private/initialize.php'); ?>


<?php include(SHARED_PATH . '/header.php'); ?>


<div id="login">
    <h1>Admin login</h1>

    <div id="admin-wrapper" class="info-wrapper">
        <img src="./public/static/assets/logo.svg">

        <form action="/login-admin" method="POST">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Write your password">

            <input type="submit" name="login" value="Continue">
        </form>
    </div>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>