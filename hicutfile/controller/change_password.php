<?php
include '../assets/php/functions.php';

$response = [];

if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Validate password and confirm password
    if($password !== $cpassword) {
        $response['status'] = 'cpassword';
    } else {
        // Check if the email exists in the database
        $stmt_select = $db->prepare("SELECT email FROM users WHERE email = ?");
        $stmt_select->bind_param("s", $email);
        $stmt_select->execute();
        $stmt_select->store_result();

        if ($stmt_select->num_rows > 0) {
        	$hashed_password = md5($cpassword);
            // Update the user's password
            $stmt_update = $db->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt_update->bind_param("ss", $hashed_password, $email);
            if ($stmt_update->execute()) {
                $response['status'] = 'success';
                $response['message'] = 'Password updated successfully!';
            } 
        } else {
            $response['status'] = 'email';
            $response['message'] = 'User not found.';
        }
    }
}

echo json_encode($response);
?>
