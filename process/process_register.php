<?php
session_start();

require_once("../reusable/get_connection.php");

$conn = get_connection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = crypt($_POST['password'], "abcd1234");

$sql = "INSERT INTO user(name, email, password, role_id) VALUES ('$name', '$email', '$password', 2)";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $_SESSION['user'] = [
        "id" => $last_id,
        "name" => $name
    ];
    $conn->close();
    header('Location: ../');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
