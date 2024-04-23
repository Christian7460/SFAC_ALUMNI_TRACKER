<?php
session_start();

// Redirect to login.php if username session variable is not set
if (!isset($_SESSION['username'])) {
    header('Location: pages/login/login.php');
    exit(); // Ensure no further code execution
}

// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>
