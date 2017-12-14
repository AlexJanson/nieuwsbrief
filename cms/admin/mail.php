<?php

session_start();

if(isset($_SESSION['logged_in'])) {

    $servername = "localhost";
    $username = "admalex_test";
    $password = "123456";
    $dbname = "admalex_person";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT mail_name FROM maillist";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
//        echo "<br> Name: ". $row["mail_name"];
        }
    } else {
//        echo "0 results";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwsbrief | Login</title>
    <link rel="stylesheet" href="../../assets/custom_style.css" />
</head>
<body>
<form action="mailsent.php" method="post">
<!--    <p>Email address: <input type="text" name="email" size="30"></p>-->
    <p>Subject: <input type="text" name="subject" size="30"></p>
    <p>Message: <textarea rows="10" cols="20" name="message"></textarea></p>
    <input type="submit" name="submit" value="Submit">
</form>
<a href="login.php"><button>&larr; Back</button></a>
</body>
</html>


