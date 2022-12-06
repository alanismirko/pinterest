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



// LOG OUT 
get('/logout', 'private/logout.php');



// ADMIN
get('/admin', 'public/admin/admin.php');



// SIGN UP
get('/signup', 'public/login/signup.php');
post('/signup', 'private/signup.php');



// LOGGED IN HOMEPAGE
post('/login', 'private/login.php');
get('/userlogin', 'public/pinterest/views/index.php');




// CREATE POST - had to put it above user-profile
get('/pin-builder', 'public/pinterest/views/post.php');
post('/create-post', 'private/create-post.php');





// USER PROFILE
get('/$user_nickname', 'public/pinterest/views/profile.php');
get('/pin-builder', 'public/pinterest/views/post.php');



// UPDATE PROFILE
get('/$user_nickname/edit-profile', 'public/pinterest/views/settings.php');
post('/update-profile', 'private/update-profile.php');


// DELETE PROFILE
get('/$user_nickname/account-settings', 'public/pinterest/views/settings.php');
post('/delete-profile', 'private/delete-profile.php');











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
any('/404','public/pinterest/views/404.php');
