<?php
// Get the note details from the request
$title = $_POST['title'];
$content = $_POST['content'];

// Insert the note into the database
// Assuming you have already set up the database connection
// Replace DB_HOST, DB_USERNAME, DB_PASSWORD, and DB_NAME with your actual database credentials
$conn = new mysqli('DB_HOST', 'DB_USERNAME', 'DB_PASSWORD', 'DB_NAME');

// Check if the connection was successful
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare('INSERT INTO notes (title, content) VALUES (?, ?)');
$stmt->bind_param('ss', $title, $content);

// Execute the statement
if ($stmt->execute()) {
  echo 'Note saved successfully';
} else {
  echo 'Error saving note: ' . $conn->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>
