<?php

$servername = "localhost";
$username = "adminalex";
$password = "skjafooh";
$dbname = "24272_maillist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>