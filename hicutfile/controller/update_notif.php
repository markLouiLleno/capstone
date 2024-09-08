<?php
include '../assets/php/functions.php';

$to_user_id = $_POST['to_user_id'];

$stmt_update = $db->prepare("UPDATE notifications SET read_status = 'read' WHERE to_user_id = ?");
$stmt_update->bind_param("i", $to_user_id);
$stmt_update->execute();

$stmt_update->close();
$db->close();
?>
