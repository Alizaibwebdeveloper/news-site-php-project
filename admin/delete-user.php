<?php

include "config.php";

// Sanitize user ID for security
$user_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

// Prepare a parameterized statement to prevent SQL injection
$stmt = $conn->prepare("DELETE FROM user WHERE user_id = ?");
$stmt->bind_param("i", $user_id);

// Execute the statement and check for errors
if ($stmt->execute()) {
    header("Location: {$hostname}/admin/users.php");
} else {
    echo "<p style='color:red; margin:10px 0;'>Error deleting user: " . $stmt->error . "</p>";
}

// Close the statement and connection
$stmt->close();
$conn->close();

?>
