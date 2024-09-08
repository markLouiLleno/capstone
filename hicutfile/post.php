<?php
include 'assets/php/functions.php';

// Initialize response array
$response = ['status' => 'error'];

// Get current user ID from session
$current_user_id = $_SESSION['userdata']['id'];

// Define the fields expected from the form
$fields = ['categories', 'caption'];

// Check if all fields including current_user_id are present
if (isset($_POST['caption']) && !empty($_POST['caption'])) {
    // Get form values
    $values = array_intersect_key($_POST, array_flip($fields));
    // Add current_user_id to the values
    $values['user_id'] = $current_user_id;

    // Prepare SQL query for freelance_post table
    $sql = "INSERT INTO freelance_post (" . implode(", ", array_keys($values)) . ") VALUES (" . implode(", ", array_fill(0, count($values), "?")) . ")";

    // Prepare and execute the statement for freelance_post
    $insert_post = $db->prepare($sql);
    if ($insert_post->execute(array_values($values))) {
        // Get the ID of the last inserted row in freelance_post
        $lastInsertId = $db->insert_id;
        
        // Process file uploads
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            // Get the file name
            $file_name = $_FILES['images']['name'][$key];
            // Generate a unique name for the file
            $file_destination = 'upload/' . uniqid() . '_' . $file_name;

            // Move the file to a permanent location
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $file_destination)) {
                // Prepare SQL query for freelance_images table
                $sql_image = "INSERT INTO images_list (freelance_id, freelance_images) VALUES (?, ?)";
                // Prepare and execute the statement for freelance_images
                $insert_image = $db->prepare($sql_image);
                if ($insert_image->execute([$lastInsertId, $file_destination])) {
                    $response['status'] = 'success';
                } else {
                    // Handle database error
                    $response['message'] = 'Error inserting image into freelance_images table.';
                }
            } else {
                // Handle file upload error
                $response['message'] = 'Failed to move uploaded file.';
            }
        }
    } else {
        // Handle database error
        $response['message'] = 'Error inserting data into freelance_post table.';
    }
} else {
    // Handle missing form field error
    $response['message'] = 'Missing or empty caption field.';
}

// Output response as JSON
echo json_encode($response);
?>
