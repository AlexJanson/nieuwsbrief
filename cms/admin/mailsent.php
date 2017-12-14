<?php

session_start();

if(isset($_SESSION['logged_in'])) {
    $submit = $_POST['submit'];
    echo $sumbit;

    if ($submit) {
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

        $sql = "SELECT mail_name FROM maillist";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
//        echo "<br> Name: ". $row["mail_name"];

                $from = "nieuwsbrief@webapp.nl";
                $email = $row["mail_name"];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                mail($email, $subject, $message, "From:" . $from);

                print "Your message has been sent to: </br>$email</p>";
            }
        } else {
            echo "0 results";
        }

//    print "Your message has been sent to: </br>$email</p>";
    }

    ?>
    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <meta charset="UTF-8">
        <title>Nieuwsbrief Webapp | Sign up</title>
        <link rel="stylesheet" href="assets/custom_style.css"
    </head>
    <body>
    <div class="container">
        <a href="mail.php"><button>&larr; Back</button></a>
    </div>
    </body>
    </html>
    <?php
} else {
    header("Location: ../../index.php");
}?>