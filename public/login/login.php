<?php require_once('././private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
if (isset($_COOKIE["login"])) {
    header("location: /home");
}
?>

<div id="login">
    <h1>Log in to <br> get your <br> ideas</h1>

    <div class="info-wrapper">
        <img src="./public/static/assets/logo.svg">
        <h2>Welcome to Pinterest</h2>

        <form action="/login" method="POST" onsubmit="validate(); return false">
            <div class="error-display">
                <p>Let's do it again - there are items that require your attention!</p>
            </div>

            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Your Email" data-validate="email">
            <span class="error-message">
                <p class="ml-2 text-xs">That is not a correct e-mail format.</p>
            </span>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Your password" data-validate="str" data-min="6" data-max="100">
            <span class="error-message">
                <p class="ml-2 text-xs">Minimum 6 characters.</p>
            </span>

            <input type="submit" value="Log in">
        </form>

        <p class="terms">By continuing, you agree to Pinterest's <br>
            <b>Terms of Service</b> and acknowledge you've read our <br>
            <b>Privacy Policy</b>
        </p>

        <a href="/signup">Not on Pinterest yet? Sign up</a>
    </div>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>