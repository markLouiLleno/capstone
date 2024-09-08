<?php
include 'assets/php/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare the SQL statement with placeholders
$sql = "INSERT INTO ratings (rated_user, who_rated, rating, descriptions) VALUES (?, ?, ?, ?)";

// Prepare the statement
$stmt = $db->prepare($sql);

// Bind parameters to the placeholders
$stmt->bind_param("iiis", $rated_user, $who_rated, $rating, $description);

// Set parameter values
$rated_user = $_POST["rated_user"];
$who_rated = $_POST["who_rated"];
$rating = $_POST["rating"];
$description = $_POST["descriptions"];

// Execute the statement
if ($stmt->execute()) {
    echo "Rating inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();
}
?>
