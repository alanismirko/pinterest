<?php

if(!isset($_COOKIE["login_admin"]))
header("location: /login-admin"); 
?>

<?php
    include_once('./././private/admin/users.php');
    $users = new Users();
    $all_users = $users->get_users();

?>

<?php require_once('./././private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>


<div class="admin-wrapper">
    <div class="workspace-wrapper">
        <div class="nav-wrapper">
            <img src="./public/static/assets/logo.svg" alt="Logo">

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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($all_users as $user){ ?>
                        <tr>
                            <td><?php echo $user[0]; ?></td>
                            <td><?php echo $user[4]; ?></td>
                            <td><?php echo $user[6] ?></td>
                            <?php $user['user_id']= $user[0]; ?>
                            <th id="delete"><a href="/delete-user/user_id/<?= $user['user_id']; ?>" >Delete</a></th>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
