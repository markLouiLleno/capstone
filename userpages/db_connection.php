<?php
$servername = "localhost";
$username = "root"; // Adjust if needed
$password = ""; // Adjust if needed
$database = "aplayadb"; // Set your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
