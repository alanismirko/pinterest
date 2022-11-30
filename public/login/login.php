<?php require_once('././private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<div id="login">
    <h1>Log in to <br> get your <br> ideas</h1>

    <div class="info-wrapper">
        <img src="./public/static/assets/logo.svg">
        <h2>Welcome to Pinterest</h2>

        <form action="/login" method="POST">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Create a password">

            <input type="submit" value="Continue">
        </form>

        <p class="terms">By continuing, you agree to Pinterest's <br>
            <b>Terms of Service</b> and acknowledge you've read our <br>
            <b>Privacy Policy</b>
        </p>

        <a href="/signup">Not on Pinterest yet? Sign up</a>
    </div>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>