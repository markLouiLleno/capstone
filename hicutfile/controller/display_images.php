<?php
include '../assets/php/functions.php';

$freelance_id = $_POST['freelance_id'];

// Check if the user has already liked the post
$sql_inner = "SELECT * FROM images_list WHERE freelance_id = ?";
$stmt_inner = $db->prepare($sql_inner);
$stmt_inner->bind_param('i', $freelance_id);
$stmt_inner->execute();
$result = $stmt_inner->get_result();

if ($stmt_inner) {
    while($row = $result->fetch_assoc()){
        $file_path = $row['freelance_images'];
        $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
        if (in_array(strtolower($file_extension), ['jpg', 'jpeg', 'png', 'gif'])) {
            // Image file
?>
            <img src="<?php echo $file_path;?>" >
<?php
        } elseif (in_array(strtolower($file_extension), ['mp4', 'webm', 'ogg'])) {
            // Video file
?>
            <video controls>
                <source src="<?php echo $file_path;?>" type="video/<?php echo strtolower($file_extension);?>">
                Your browser does not support the video tag.
            </video>
<?php
        } else {
            // Unsupported file type, handle accordingly
            echo "Unsupported file type for: " . $file_path;
        }
    }
}

$db->close();
?>
