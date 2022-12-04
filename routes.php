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

get('/userlogin', 'public/pinterest/views/index.php');




// LOG OUT 
get('/logout', 'private/logout.php');
get('/admin-logout', 'public/admin/apis/logout.php');



// ADMIN
get('/admin', 'public/admin/views/admin.php');




// SIGN UP
get('/signup', 'public/login/signup.php');
post('/signup', 'private/signup.php');




// USER PROFILE
get('/$user_nickname', 'public/pinterest/views/profile.php');

// DELETE USER
get('/delete-user/user_id/$user_id', 'public/admin/apis/delete_user.php');



// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
get('/user/$id', 'views/user');



// Dynamic GET. Example with 2 variables
// The $name will be available in full_name.php
// The $last_name will be available in full_name.php
// In the browser point to: localhost/user/X/Y
get('/user/$name/$last_name', 'views/full_name.php');




// Dynamic GET. Example with 2 variables with static
// In the URL -> http://localhost/product/shoes/color/blue
// The $type will be available in product.php
// The $color will be available in product.php
get('/product/$type/color/$color', 'product.php');




// A route with a callback
get('/callback', function(){
  echo 'Callback executed';
});

// A route with a callback passing a variable
// To run this route, in the browser type:
// http://localhost/user/A
get('/callback/$name', function($name){
  echo "Callback executed. The name is $name";
});




// A route with a callback passing 2 variables
// To run this route, in the browser type:
// http://localhost/callback/A/B
get('/callback/$name/$last_name', function($name, $last_name){
  echo "Callback executed. The full name is $name $last_name";
});




// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');
