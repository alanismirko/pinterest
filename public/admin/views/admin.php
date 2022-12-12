<?php

if(!isset($_COOKIE["login_admin"]))
header("location: /login-admin"); 
?>

<?php
    include_once('./././private/admin/users.php');
    require_once('././_validator.php');

    $users = new Users();
    $all_users = $users->get_users();

?>

<?php require_once('./././private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>


<div class="admin-wrapper">
    <div class="workspace-wrapper">
        <div class="nav-wrapper">
            <img id="logo" src="./public/static/assets/logo.svg" alt="Logo">

            <div class="navigation">
                <a class="nav-button-wrapper">
                    <img src="./public/static/assets/users.png" alt="">
                    <p>All users</p> 
                </a>
                <a href="/admin-logout" class="nav-button-wrapper">
                    <img src="./public/static/assets/logout.png" alt="">
                    <p>Logout</p>
                </a>
            </div>
        </div>

        <div class="users-wrapper">
            <h2>All users</h2>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>User id</th>
                            <th>Email</th>
                            <th>Date of birth</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($all_users as $user){ ?>
                        <tr>
                            <td><?php _out($user[0]); ?></td>
                            <td><?php _out( $user[4]); ?></td>
                            <td><?php _out( $user[6]); ?></td>
                            <td><?php _out( $user[1]); ?></td>
                            <td><?php _out( $user[2]); ?></td>
                            <td><?php _out( $user[3]); ?></td>

                            <?php $user['user_id']= $user[0]; ?>
                            <th id="delete"><button><a href="/delete-user/user_id/<?= $user['user_id']; ?>" >Delete</a></button></th>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
