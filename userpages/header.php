<?php
// Check if a session is already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include database connection
if (!include 'db_connection.php') {
    die("Failed to include database connection.");
}

// Get the user ID (assuming you have it; you can set it based on session or request)
$userId = 1; // Change this as needed

// Fetch user data from the database, including first_name, last_name, email, user_type, avatar, google_id, and bio
$query = "SELECT first_name, last_name, email, user_type, avatar, google_id, bio FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc(); // Fetch user data as an associative array

// Initialize variables to avoid undefined index warnings
$firstName = isset($user['first_name']) ? $user['first_name'] : '';
$lastName = isset($user['last_name']) ? $user['last_name'] : '';
$email = isset($user['email']) ? $user['email'] : '';
$userType = isset($user['user_type']) ? $user['user_type'] : '';
$avatar = isset($user['avatar']) ? $user['avatar'] : 'img/user.jpg'; // Use existing avatar or default image
$googleId = isset($user['google_id']) ? $user['google_id'] : ''; // New google_id field
$bio = isset($user['bio']) ? $user['bio'] : ''; // New bio field

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from POST
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $userType = $_POST['user_type'];
    $googleId = $_POST['google_id']; // Get google_id from POST data
    $bio = $_POST['bio']; // Get bio from POST data

    // Initialize a variable to hold the new avatar path
    $newAvatar = $avatar; // Default to existing avatar

    // Handle file upload
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        // File upload settings
        $uploadDir = 'img/'; // Directory to save uploaded images
        $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Check if file is an image
        $check = getimagesize($_FILES['avatar']['tmp_name']);
        if ($check !== false && in_array($imageFileType, $validExtensions)) {
            // Move the uploaded file to the desired directory
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
                $newAvatar = $uploadFile; // Update the new avatar path
            } else {
                echo "Error moving uploaded file.";
            }
        } else {
            echo "File is not an image or unsupported file type.";
        }
    }

    // Prepare the SQL update statement
    $updateQuery = "UPDATE users SET first_name = ?, last_name = ?, email = ?, user_type = ?, avatar = ?, google_id = ?, bio = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters, including the (possibly updated) avatar, google_id, and bio
    $stmt->bind_param("sssssssi", $firstName, $lastName, $email, $userType, $newAvatar, $googleId, $bio, $userId);

    // Execute the statement
    if ($stmt->execute()) {
        // Set session message
        $_SESSION['notification'] = "Your profile has been updated!";
        // Redirect to profile.php after successful update
        header("Location: profile.php");
        exit(); // Ensure script stops after header redirect
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JPAMS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis .com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar sticky-top px-4 py-2 py-lg-0">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand Logo -->
            <a href="../views/customer_dashboard.php" class="navbar-brand">
                <img src="../img/JPAMS LOGO.png" alt="Logo" loading="lazy" style="max-height: 80px; width: auto;">
            </a>
            <!-- Toggler Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto py-0">
                    <li class="nav-item">
                        <a href="customer_dashboard.php" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="../userpages/contact.php" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="../userpages/package.php" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="../userpages/about.php" class="nav-link">About</a>
                    </li>
                </ul>
                <!-- Social Icons -->
                <div class="team-icon d-none d-xl-flex justify-content-center me-3">
                    <a class="btn btn-square btn-light rounded-circle mx-1" href="https://www.facebook.com/profile.php?id=100081561532377" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <!-- Add more social icons if needed -->
                </div>
                <!-- User Dropdown -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="me-lg-2" src="" alt="">
                        <span class="d-none d-lg-inline-flex"><?php echo $firstName; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="../userpages/profile.php" class="dropdown-item">My Profile</a>
                        <a href="logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar & Hero End -->