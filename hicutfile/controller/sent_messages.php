<?php
// Include the file that establishes the database connection
include '../assets/php/functions.php';

$response = [];
if (isset($_POST['receiver_id'], $_POST['sender_id'], $_POST['messages'])) {
    $receiver_id = $_POST['receiver_id'];
    $sender_id = $_POST['sender_id'];
    $messages = $_POST['messages'];

    // Assuming $db is your mysqli object
    $stmt_insert = $db->prepare("INSERT INTO conversation (messages, sender_id, receiver_id) VALUES (?, ?, ?)");
    $stmt_insert->bind_param("sii", $messages, $sender_id, $receiver_id); // "sii" indicates string, integer, integer
    $stmt_insert->execute();

    // Check if insertion was successful
    if ($stmt_insert->affected_rows > 0) {
            $message = "You have a new message!";
            $stmt_insert2 = $db->prepare("INSERT INTO notifications (from_user_id, to_user_id, message, type) VALUES (?, ?, ?, 'conversation')");
            $stmt_insert2->bind_param("iis", $sender_id, $receiver_id, $message); // "ii" indicates two integers
            $stmt_insert2->execute();
            if ($stmt_insert2) {
                $response['status'] = 'success';
            }
    }
}
echo json_encode($response);
?>
