<?php
// Step 1: Start the session so we can destroy it
session_start();

// Step 2: Remove all session variables
session_unset();

// Step 3: Destroy the session completely
session_destroy();

// Step 4: Redirect to login page
header("Location: login.html");
exit();
?>
