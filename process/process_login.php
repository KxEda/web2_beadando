<?php
session_start();

require_once("../reusable/get_connection.php");

$conn = get_connection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = crypt($_POST['password'], "abcd1234");

$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name']
    ];
    $conn->close();
    header('Location: ../');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
