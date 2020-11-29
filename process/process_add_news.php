<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['errors'] = [
        "You have to login to add news!"
    ];
    header('Location: ../');
}

require_once("../reusable/get_connection.php");

$conn = get_connection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$content = $_POST['content'];
$userId = $_SESSION['user']['id'];
$createdAt = date("Y-m-d");

$sql = "INSERT INTO news(title, content, created_at, user_id) VALUES ('$title', '$content', '$createdAt', '$userId')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header('Location: ../');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
