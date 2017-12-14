<?php

session_start();

include_once('../../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
    ?>

    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="../../assets/custom_style.css" />
    </head>
    <body>
    <h1>You are logged in.</h1>
    <a href="emailedit.php"><button>Edit registered accounts</button></a>
    <a href="mail.php"><button>Send email</button></a>
    <a href="logout.php"><button>Logout</button></a>
    <a href="../../index.php"><button>&larr; Back</button></a>
    </body>
    </html>

    <?php
} else {

    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if (empty($username) or empty($password)) {
            $error = 'All fields are required!';

        } else {
            $sql = "SELECT * FROM users WHERE user_name='".$username."' AND user_password='".$password."' limit 1";
            $result = $conn->prepare($sql);
            $result = $conn->query($sql);

            if($result->num_rows == 1) {
                echo 'no';
                $_SESSION['logged_in'] = true;
                header('Location: login.php');
                exit();
            }
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="../../assets/custom_style.css" />
    </head>
    <body>
        <form action="" method="post" autocomplete="off" id="login">
            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <input type="submit" value="Login" />
        </form>
        <a href="../../index.php"><button>&larr; Back</button></a>
    </body>
    </html>

    <?php
}

?>