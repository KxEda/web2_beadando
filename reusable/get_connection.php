<?php

function get_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "koszegi_edina_web2";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
