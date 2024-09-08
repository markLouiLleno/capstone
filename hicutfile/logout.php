<?php
session_start(); // Start the session if it's not already started

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user or perform any other actions after destroying the session
header("Location: login.php"); // Redirect to a login page or any other appropriate page
exit;
?>