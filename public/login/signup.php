<?php require_once('././private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<div id="signup">
    <h1>Sign up to <br> get your <br> ideas</h1>

    <div class="info-wrapper">
        <img src="./public/static/assets/logo.svg">
        <h2>Welcome to Pinterest</h2>
        <p>Find new ideas to try</p>

        <form action="/signup" method="POST">
            <label for="user_email">Email</label>
            <input type="text" name="user_email" placeholder="Email">

            <label for="user_password">Password</label>
            <input type="password" name="user_password" placeholder="Create a password">

            <label for="date_of_birth">Date of birth</label>
            <input type="date" name="user_dateofbirth">

            <label for="user_firstname">First Name</label>
            <input type="text" name="user_firstname" placeholder="First Name">

            <label for="user_lastname">Last Name</label>
            <input type="text" name="user_lastname" placeholder="Last Name">

            <label for="user_nickname">Username</label>
            <input type="text" name="user_nickname" placeholder="Username">

            <input type="submit" value="Continue">
        </form>

        <p class="terms">By continuing, you agree to Pinterest's <br>
            <b>Terms of Service</b> and acknowledge you've read our <br>
            <b>Privacy Policy</b>
        </p>

        <a href="login.php">Already a memeber? Log in</a>
    </div>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>