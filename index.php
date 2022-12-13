<?php
if (!isset($_COOKIE["login"])) {
    header("location: /login");
} else {
    header("location: /home");
}
?>


<a href="/login">User</a>
<a href="/login-admin">Admin</a>