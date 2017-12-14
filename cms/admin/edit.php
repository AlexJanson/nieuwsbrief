<?php

session_start();

include_once("../../includes/connection.php");

if(isset($_SESSION["logged_in"])) {
    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $sql = "SELECT * FROM maillist";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
//                echo "<p><br>". $row["mail_name"] ."<a href='edit.php?edit=".$row["mail_id"]."'> edit</a></p>";

                if(isset($_POST['newEmail'])) {
                    $newEmail = $_POST['newEmail'];
                    $id = $_POST['id'];

                    echo $id;
                    echo $newEmail;

                    $sql = "UPDATE maillist SET mail_name='".$newEmail."' WHERE mail_id='".$id."'";
                    $result = $conn->query($sql);
                    echo "<meta http-equiv='refresh' content='0;url=emailedit.php'>";
                }

    ?>
    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="../../assets/custom_style.css"/>
    </head>
    <body>
    <?php if($id == $row['mail_id']) {?>
    <form action="" method="post">
        <p>Email: <input type="text" name="newEmail" value="<?php if($id == $row['mail_id']) {echo $row['mail_name']; }?>"></p>
        <input type="hidden" name="id" value="<?php if($id == $row['mail_id']) {echo $row['mail_id']; }?>">
        <input type="submit" name="btn_upload" value="Update">
    </form>
    <?php } ?>
    </body>
    </html>
    <?php
            }
        }
    }
} else {

}
    ?>