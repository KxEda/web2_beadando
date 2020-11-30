<?php
require_once("../reusable/get_connection.php");
require_once("../models/News.php");

$conn = get_connection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$newsArray = array();

$sql = "SELECT * FROM news ORDER BY created_at DESC LIMIT 3";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($newsRow = $result->fetch_assoc()) {
        $news = new News($newsRow);
        $newsArray[] = $news;
    }
}



$data = array(
    "data" => $newsArray
);

echo json_encode($data);
