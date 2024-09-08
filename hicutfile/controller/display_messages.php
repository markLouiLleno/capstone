<?php include '../assets/php/functions.php';

// Check if the user has already liked the post
$receiver_id = $_POST['receiver_id'];
$sender_id = $_SESSION['userdata']['id'];
$sql_inner = "SELECT * FROM conversation WHERE (receiver_id = ? AND sender_id = ?) OR (sender_id = ? AND receiver_id = ?)";
$stmt_inner = $db->prepare($sql_inner);
$stmt_inner->bind_param('iiii', $receiver_id, $sender_id, $receiver_id, $sender_id);
$stmt_inner->execute();
$result = $stmt_inner->get_result();

if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) {
        
      if ($row['sender_id'] == $sender_id) {
?>
        <div class="bg-secondary-subtle py-2 px-3 rounded-4 ms-auto" style="max-width: 30em;">
            <div><?php echo $row['messages']; ?></div>
            <div class="form-text m-0" style="font-size: 11px;">
                <?php  
                    $datetime = $row['conversation_time']; 
                    $formatted = date("F j, i - h:i A", strtotime($datetime));
                    echo $formatted;
                ?>
            </div>
        </div>
       
<?php
    }else{
?>
        <div class="bg-secondary-subtle py-2 px-3 rounded-4 me-auto" style="max-width: 30em;">
            <div><?php echo $row['messages']; ?></div>
            <div>hehe</div>
        </div>
        
<?php      
    }
}
}
$stmt_inner->close();
$db->close();
?>