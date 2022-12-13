<?php require_once('././private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
if (!isset($_COOKIE["login"])) {
    header("location: /signup");
} else {
    header("location: /home");
}
?>

<div id="signup">
    <h1>Sign up to <br> get your <br> ideas</h1>

    <div class="info-wrapper">
        <img src="./public/static/assets/logo.svg">
        <h2>Welcome to Pinterest</h2>
        <p>Find new ideas to try</p>

        <form action="/signup" method="POST" data-steps="1" onsubmit="validate(); return false">
            <div class="error-display">
                <p>Let's do it again - there are items that require your attention!</p>
            </div>
            <div class="signup-part1">
                <label for="user_email">Email</label>
                <input type="text" name="user_email" placeholder="Email" data-validate="email">
                <span class="error-message">
                    <p class="ml-2 text-xs">That is not a correct e-mail format.</p>
                </span>


                <label for="user_password">Password</label>
                <input type="password" name="user_password" placeholder="Create a password" data-validate="str" data-min="6" data-max="100">
                <span class="error-message">
                    <p class="ml-2 text-xs">Minimum 6 characters.</p>
                </span>

                <label for="date_of_birth">Date of birth</label>
                <input type="date" name="user_dateofbirth">

                <button id="stepup" type="button">Continue</button>
            </div>
            <div class="signup-part2">
                <label for="user_firstname">First Name</label>
                <input type="text" name="user_firstname" placeholder="First Name" data-validate="str" data-min="2" data-max="20">
                <span class="error-message">
                    <p class="ml-2 text-xs">Minimum 2, maximum 20 characters.</p>
                </span>

                <label for="user_lastname">Last Name</label>
                <input type="text" name="user_lastname" placeholder="Last Name" data-validate="str" data-min="2" data-max="20">
                <span class="error-message">
                    <p class="ml-2 text-xs">Minimum 2, maximum 20 characters.</p>
                </span>

                <label for="user_nickname">Username</label>
                <input type="text" name="user_nickname" placeholder="Username" data-validate="str" data-min="2" data-max="20">
                <span class="error-message">
                    <p class="ml-2 text-xs">Minimum 2, maximum 20 characters.</p>
                </span>

                <div class="input-container">
                    <span class="icon-container">
                        <button id="stepdown" type="button">
                            <img src="public/static/assets/arrow-back.png" alt="">
                        </button>
                    </span>
                    <input type="submit" value="Sign up">
                </div>
            </div>
        </form>

        <p class="terms">By continuing, you agree to Pinterest's <br>
            <b>Terms of Service</b> and acknowledge you've read our <br>
            <b>Privacy Policy</b>
        </p>

        <a href="login.php">Already a member? Log in</a>
    </div>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>