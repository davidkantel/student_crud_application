<?php
include '../config/db.php';

$id = $_GET['id'];

$stmt = $mysqli->prepare('DELETE FROM students WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

header('Location: index.php');
exit;
?>
