<?php
include '../assets/php/functions.php';

$response = [];

if(isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['userdata']['username'];

    // Check if a new profile image was uploaded
    if(isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] === UPLOAD_ERR_OK) {
        $profile_img_tmp = $_FILES['profile_img']['tmp_name'];
        $profile_img_name = $_FILES['profile_img']['name'];
        $profile_img_path = '../upload/' . $profile_img_name; // Specify the upload directory

        // Move the uploaded file to the specified directory
        if(move_uploaded_file($profile_img_tmp, $profile_img_path)) {
            // Update the database with the new profile image path
            $stmt_update = $db->prepare("UPDATE users SET profile_pic = ?, username = ? WHERE id = ?");
            $stmt_update->bind_param("ssi", $profile_img_name, $username, $user_id);
            $stmt_update->execute();

            if($stmt_update->affected_rows > 0) {
                $response['status'] = 'success';
            }
        }
    }
}

echo json_encode($response);
?>
