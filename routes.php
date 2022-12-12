<?php

require_once __DIR__.'/router.php';

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
get('/', 'index.php');

// LOG IN
get('/login', 'public/login/login.php');
get('/login-admin', 'public/login/login_admin.php');

// LOGGED IN HOMEPAGE
post('/login', 'private/login.php');
post('/login-admin', 'public/admin/apis/login.php');
get('/home', 'public/pinterest/views/index.php');

// LOG OUT 
get('/logout', 'private/logout.php');
get('/admin-logout', 'public/admin/apis/logout.php');

// ADMIN
get('/admin', 'public/admin/views/admin.php');

// SIGN UP
get('/signup', 'public/login/signup.php');
post('/signup', 'private/signup.php');

// DELETE USER
get('/delete-user/user_id/$user_id', 'public/admin/apis/delete_user.php');

// CREATE POST - had to put it above user-profile
get('/pin-builder', 'public/pinterest/views/post.php');
post('/create-post', 'private/create-post.php');

// DELETE POST
post('/delete-post', 'private/delete-post.php');

// UPDATE PROFILE
get('/$user_nickname/edit-profile', 'public/pinterest/views/settings.php');
post('/update-profile', 'private/update-profile.php');

// DELETE PROFILE
get('/$user_nickname/account-settings', 'public/pinterest/views/settings.php');
post('/delete-profile', 'private/delete-profile.php');

// USER PROFILE
get('/$user_nickname/user-profile', 'public/pinterest/views/profile.php');
get('/pin-builder', 'public/pinterest/views/post.php');

// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','public/pinterest/views/404.php');
