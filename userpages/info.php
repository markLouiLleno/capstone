<?php
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
if (!include 'db_connection.php') {
    die("Failed to include database connection.");
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user ID (Change this as needed)
$userId = 1;

// Fetch user data from the database
$query = "SELECT first_name, last_name, email, user_type, avatar FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Initialize variables to avoid undefined index warnings
$firstName = $user['first_name'] ?? '';
$lastName = $user['last_name'] ?? '';
$email = $user['email'] ?? '';
$userType = $user['user_type'] ?? '';
$avatar = $user['avatar'] ?? '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and assign the form inputs
    $firstName = htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $userType = htmlspecialchars(trim($_POST['user_type']));
    $profilePictureData = null;

    // Handle file upload
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileSize = $_FILES['avatar']['size'];

        // Optionally validate file size
        if ($fileSize < 5000000) { // Limit to 5MB
            // Read the file content
            $profilePictureData = file_get_contents($fileTmpPath);
        } else {
            echo "Upload failed. File size should be less than 5MB.";
            exit; // Stop further execution
        }
    }

    // Prepare and execute the SQL update statement
    $updateQuery = "UPDATE users SET first_name = ?, last_name = ?, email = ?, user_type = ?, avatar = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters; use NULL for avatar if not uploaded
    $stmt->bind_param("sssssi", $firstName, $lastName, $email, $userType, $profilePictureData, $userId);

    // Execute the statement
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $_SESSION['notification'] = "Your profile has been updated!";
        } else {
            echo "No changes made to the profile.";
        }
        // Redirect to profile.php after successful update
        header("Location: profile.php");
        exit();
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-container {
            margin: 50px auto;
            max-width: 600px;
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            border-radius: 50%;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <h2 class="text-center">Edit Profile</h2>
        <form action="update_profile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo htmlspecialchars($firstName); ?>" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo htmlspecialchars($lastName); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>

            <div class="form-group">
                <label for="user_type">User Type:</label>
                <input type="text" class="form-control" name="user_type" value="<?php echo htmlspecialchars($userType); ?>" required>
            </div>

            <div class="form-group">
                <label for="avatar">Profile Picture:</label>
                <input type="file" class="form-control-file" name="avatar" accept="image/*">
                <?php if (!empty($avatar)) { ?>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($avatar); ?>" alt="Profile Picture" class="profile-image" width="100">
                <?php } else { ?>
                    <p>No profile picture uploaded yet.</p>
                <?php } ?>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
        </form>
        <?php
        // Display notification if available
        if (isset($_SESSION['notification'])) {
            echo "<p class='text-success'>" . $_SESSION['notification'] . "</p>";
            unset($_SESSION['notification']); // Clear the notification after displaying it
        }
        ?>
    </div>
</body>

</html>