<?php
session_start();
include('config.php');

if (isset($_POST['register_btn'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO users (firstname, lastname, contact, password, role) VALUES ('$firstname', '$lastname', '$contact', '$password', 'user')";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Registration successful! You can now log in.";
        header('location: index.php');
    } else {
        $_SESSION['message'] = "Something went wrong. Please try again.";
        header('location: index.php');
    }
}
?>
