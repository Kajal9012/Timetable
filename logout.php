<?php
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Remove cookies securely, including HttpOnly cookies
if (isset($_COOKIE['user_session'])) {
    setcookie('user_session', '', time() - 3600, '/', '', false, true);
}

if (isset($_COOKIE['authToken'])) {
    setcookie('authToken', '', time() - 3600, '/', '', false, true);
}

// Redirect to login page or home
header("Location: index.php");
exit();
?>
