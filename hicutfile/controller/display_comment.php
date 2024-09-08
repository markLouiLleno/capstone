<?php
include '../assets/php/functions.php';

if (isset($_POST['post_id']) && is_numeric($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    // Check if the user has already liked the post
    $sql_inner = "SELECT * FROM comments INNER JOIN users u ON u.id = comments.user_id  WHERE post_id = ?";
    $stmt_inner = $db->prepare($sql_inner);
    $stmt_inner->bind_param('i', $post_id);
    $stmt_inner->execute();
    $result = $stmt_inner->get_result();

    if ($stmt_inner) { 
        while($row = $result->fetch_assoc()){
?>  
    <div class="d-flex column-gap-2">
        <a class="text-reset text-decoration-none" href="works.php?user_id=<?php echo $row['user_id'];?>">
            <img src="images/profile.png" width="40">
        </a>
        <div>
            <b><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></b>
            <p><?php echo $row['comment'];?></p>
        </div>
    </div>

<?php
        }
    }
}
$db->close();

?>
