<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<div id="login">
    <h1>Sign up to <br> get your <br> ideas</h1>

    <div class="info-wrapper">
        <img src="../static/assets/logo.svg">
        <h2>Welcome to Pinterest</h2>
        <p>Find new ideas to try</p>

        <form action="">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email">

            <label for="password">Password</label>
            <input type="text" name="password" placeholder="Create a password">

            <label for="age">Age</label>
            <input type="text" name="age" placeholder="Age">

            <input type="submit" value="Continue">
        </form>

        <p class="terms">By continuing, you agree to Pinterest's <br>
            <b>Terms of Service</b> and acknowledge you've read our <br>
            <b>Privacy Policy</b>
        </p>

        <a>Already a memeber? Log in</a>
    </div>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
