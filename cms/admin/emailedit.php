<?php

session_start();

include_once('../../includes/connection.php');

if(isset($_SESSION['logged_in'])) {

    ?>

    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="../../assets/custom_style.css" />
    </head>
    <body>
    <h1>List of registered emails:</h1>


    <?php
    $sql = "SELECT * FROM maillist";
    $result = $conn->query($sql);

    if($result->num_rows <= 0) {
        echo '<p style="color: #aa0000"><strong>Nothing in here!</strong></p>';
    }

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<p><br>". $row["mail_name"] ."<a href='edit.php?edit=".$row["mail_id"]."'><button>Edit</button></a><a href='delete.php?delete=".$row["mail_id"]."'><button>Delete</button></a></p>";
//            if(!$row['mail_name']) {
//                echo "<p style='color: #aa0000;'></p>";
//            }
        }
    }

?>
    <a href="login.php"><button>&larr; Back</button></a>
    </body>
    </html>

<?php
} else {
    header("Location: ../../index.php");
}
?>
