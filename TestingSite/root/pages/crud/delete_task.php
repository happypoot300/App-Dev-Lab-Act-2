<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM tasks WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Redirect to the task list page
    header('Location: index.php');
    exit(); // Ensure no further code is executed
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
