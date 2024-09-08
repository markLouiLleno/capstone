<?php
include '../assets/php/functions.php';

$sender_id = $_SESSION['userdata']['id'];
$limit_character = 27;
$search_term = isset($_POST['value']) ? $_POST['value'] : '';
$sql_inner = "SELECT *, SUBSTRING(MAX(c.messages), 1, $limit_character) AS latest_messages
              FROM conversation AS c
              LEFT JOIN users AS u ON u.id = c.receiver_id
              WHERE c.sender_id = ?";
$params = ['i', &$sender_id];

if (!empty($search_term)) {
    $sql_inner .= " AND (u.first_name LIKE CONCAT('%', ?, '%') OR u.last_name LIKE CONCAT('%', ?, '%'))";
    $params[0] .= 'ss'; // Update parameter types for search term
    $params[] = &$search_term;
    $params[] = &$search_term;
}

$sql_inner .= " GROUP BY c.receiver_id, c.sender_id
                ORDER BY c.conversation_id DESC";

$stmt_inner = $db->prepare($sql_inner);
// Using call_user_func_array to bind parameters dynamically
call_user_func_array([$stmt_inner, 'bind_param'], $params);
$stmt_inner->execute();
$result = $stmt_inner->get_result();

if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) {
        ?>
        <a href="conversation.php?receiver_id=<?php echo $row['id']; ?>"
           class="messagebox text-dark text-decoration-none nav-item d-flex align-items-center gap-3 p-2 mx-2 rounded"
           role="button" data-receiver="<?php echo $row['id'];?>">
            <img src="images/profile.png" width="70" height="70" class="rounded-circle">
            <div>
                <strong class="fs-4"><?php echo $row['first_name']." ".$row['last_name']; ?></strong>
                <small class="m-0 d-block"><?php echo $row['latest_messages']; ?>...</small>
            </div>
        </a>
        <?php      
    }
}
$stmt_inner->close();
$db->close();
?>
