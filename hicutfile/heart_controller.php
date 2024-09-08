<?php
include 'assets/php/functions.php';

$response = [];

// Establish a database connection (assuming $db is your database connection object)

// Check if post_id and user_id are set and numeric
if(isset($_POST['post_id'], $_POST['user_id'], $_POST['to_user_id']) && is_numeric($_POST['post_id']) && is_numeric($_POST['user_id']) && is_numeric($_POST['to_user_id'])) {
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $to_user_id = $_POST['to_user_id'];
    
    // Check if the user has already liked the post
    $sql_inner = "SELECT * FROM likes WHERE user_id = ? AND post_id = ?";
    $stmt_inner = $db->prepare($sql_inner);
    $stmt_inner->bind_param('ii', $user_id, $post_id);
    $stmt_inner->execute();
    $stmt_inner->store_result();
    

    if ($stmt_inner->num_rows > 0) {  
        // If the user has already liked the post, remove the like
        $sql_delete = "DELETE FROM likes WHERE user_id = ? AND post_id = ?";
        $stmt_delete = $db->prepare($sql_delete);
        $stmt_delete->bind_param('ii', $user_id, $post_id);
        $stmt_delete->execute();
        $stmt_delete->close();

        // Set response status to indicate success
        $response['status'] = 'success_unlike';
    } else {
        // If the user hasn't liked the post, add a like
        $stmt_insert = $db->prepare("INSERT INTO likes (post_id, user_id) VALUES (?, ?)");
        $stmt_insert->bind_param("ii", $post_id, $user_id); // "ii" indicates two integers
        $stmt_insert->execute();

        // Check if the insertion was successful
        if ($stmt_insert->affected_rows > 0) {
            $message = "Someone heart your post!";
            $stmt_insert2 = $db->prepare("INSERT INTO notifications (from_user_id, to_user_id, message) VALUES (?, ?, ?)");
            $stmt_insert2->bind_param("iis", $user_id, $to_user_id, $message); // "ii" indicates two integers
            $stmt_insert2->execute();
            if ($stmt_insert2) {
                $response['status'] = 'success';
            }
        } else {
            $response['status'] = 'error';
        }
        $stmt_insert->close();
    }

    $stmt_inner->close();
} else {
    $response['status'] = 'invalid_input';
}

// Close the database connection
$db->close();

// Output response
header('Content-Type: application/json');
echo json_encode($response);
?>
