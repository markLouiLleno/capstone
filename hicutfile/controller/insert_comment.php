<?php
include '../assets/php/functions.php';
?>
<div>All Comments:</div>
<?php
if(isset($_POST['post_id'], $_POST['user_id'], $_POST['comment'], $_POST['to_user_id'])) {
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $to_user_id = $_POST['to_user_id'];
    $comment = $_POST['comment'];

        // If the user hasn't liked the post, add a like
        $stmt_insert = $db->prepare("INSERT INTO comments (post_id, user_id, comment) VALUES (?, ?, ?)");
        $stmt_insert->bind_param("iis", $post_id, $user_id, $comment); // "ii" indicates two integers
        $stmt_insert->execute();

        if ($stmt_insert) {
        	$message = "commented on your post user: ".$user_id;
	        $stmt_insert2 = $db->prepare("INSERT INTO notifications (to_user_id, from_user_id, message) VALUES (?, ?, ?)");
	        $stmt_insert2->bind_param("iis", $to_user_id, $user_id, $message); // "ii" indicates two integers
	        $stmt_insert2->execute();
        	if ($stmt_insert2) {
        	// Check if the user has already liked the post
		    $sql_inner = "SELECT * FROM comments INNER JOIN users u ON u.id = comments.user_id  WHERE post_id = ?";
		    $stmt_inner2 = $db->prepare($sql_inner);
		    $stmt_inner2->bind_param('i', $post_id);
		    $stmt_inner2->execute();
		    $result2 = $stmt_inner2->get_result();
		    if ($stmt_inner2) { 
       		 	while($row = $result2->fetch_assoc()){
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
    }
} 
?>
