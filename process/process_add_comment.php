<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['errors'] = [
        "You have to login to add comment!"
    ];
    header('Location: ../');
}

require_once("../reusable/get_connection.php");

$conn = get_connection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$content = $_POST['content'];
$userId = $_SESSION['user']['id'];
$createdAt = date("Y-m-d");

// Komment.
$newsId = $_POST["news_id"];

$sql = "INSERT INTO comment(content, created_at, user_id, news_id) VALUES ('$content', '$createdAt', '$userId', '$newsId')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header('Location: ../news.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
