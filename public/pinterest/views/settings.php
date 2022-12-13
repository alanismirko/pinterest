<?php require_once('./././private/initialize.php'); ?>

<?php require_once(SHARED_PATH . '/header_pinterest.php'); ?>

<?php

if (!isset($_COOKIE["login"]))
    header("location: /login");
?>

<?php
$user_email = $_COOKIE['user_email'];

$query_user = $db->prepare('SELECT * FROM users WHERE email=:user_email');
$query_user->bindValue(':user_email', $user_email);
$query_user->execute();
$query_user = $query_user->fetchAll();
$user_firstname = $query_user[0]['first_name'];
$user_lastname = $query_user[0]['last_name'];
$user_nickname = $query_user[0]['nick_name'];
$user_dateofbirth = $query_user[0]['date_of_birth'];
$user_letter = ucfirst(substr($user_nickname, 0, 1));

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>

<section class="profile-container">
    <div class="profile-edit-wrapper">

        <div class="category-edit">
            <ul>
                <li class="<?php if (strpos($url, 'edit-profile') == true) {
                                echo 'active';
                            } ?>"><a href="/<?php _out($user_nickname) ?>/edit-profile">Public profile</a></li>
                <li class="<?php if (strpos($url, 'account-settings') == true) {
                                echo 'active';
                            } ?>"><a href="/<?php _out($user_nickname) ?>/account-settings">Account management</a></li>
                <li>Personal information</li>
                <li>Tune your home feed</li>
                <li>Claimed accounts</li>
                <li>Social permissions</li>
                <li>Notifications</li>
                <li>Privacy and data</li>
                <li>Security and logins</li>
                <li>Branded Content</li>
            </ul>
        </div>


        <?php
        if (strpos($url, 'account-settings') == true) {
        ?>
            <div class="profile-edit account-settings">
                <h3>Account management</h3>
                <p>This information is private and will not be visible in your public profile.
                </p>

                <form action="/delete-profile" method="POST">
                    <div>
                        <h6>Delete your account</h6>
                        <p>Delete your account and account data</p>
                    </div>
                    <input type="submit" value="Delete account">
                </form>
            </div>
        <?php
        } else { ?>
            <div class="profile-edit">
                <h3>Public profile</h3>
                <p>People visiting your profile will see the following info
                </p>

                <form action="/update-profile" method="POST">
                    <div class="grid">
                        <div>
                            <label for="user_firstname">First Name</label>
                            <input type="text" name="user_firstname" placeholder="<?php _out($user_firstname) ?>">
                        </div>

                        <div>
                            <label for="user_lastname">Last Name</label>
                            <input type="text" name="user_lastname" placeholder="<?php _out($user_lastname) ?>">
                        </div>
                    </div>

                    <label for="user_email">Email</label>
                    <input type="text" name="user_email" placeholder="<?php _out($user_email) ?>">

                    <label for="user_password">Password</label>
                    <input type="password" name="user_password">

                    <label for="user_nickname">Username</label>
                    <input type="text" id="nickname-input" name="user_nickname" placeholder="<?php _out($user_nickname) ?>">
                    <span class="terms">
                        <p>www.pinterest.com/</p>
                        <p id="nickname-output"><?php _out($user_nickname) ?></p>
                    </span>

                    <input type="submit" value="Save">
                </form>


            </div>
        <?php }
        ?>

    </div>
</section>

<?php include(SHARED_PATH . '/footer.php'); ?>