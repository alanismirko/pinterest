<?php
    session_start();
    if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
        header('location: /login-admin');

    }
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
                <a class="nav-button-wrapper">
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
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Date of birth</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
