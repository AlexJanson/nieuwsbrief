<?php

session_start();

include_once('../../includes/connection.php');

if(isset($_SESSION['logged_in'])) {
    if(isset($_GET['delete'])) {

        $id = $_GET['delete'];
        $name = $_GET['mail_name'];

        $sql = "SELECT * FROM maillist";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
//                echo "<p><br>". $row["mail_name"] ."<a href='edit.php?edit=".$row["mail_id"]."'><button>Edit</button></a><a href='delete.php?delete=".$row["mail_id"]."'><button>Delete</button></a></p>";
                if($row['mail_id'] == $id) {
                    $name = $row['mail_name'];
                }

                $sql = "DELETE FROM maillist WHERE  mail_id='".$id."'";
                $result = $conn->query($sql);
                echo "<meta http-equiv='refresh' content='0;url=emailedit.php'>";
            }
        }

        echo $id;
        echo $name;
    }
}

?>
