<?php
session_start();

include_once('../../includes/connection.php');

if(isset($_SESSION['logged_in'])) {

    ?>

    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <meta charset="UTF-8">
        <title>Nieuwsbrief Webapp | Home</title>
        <link rel="stylesheet" href="../../assets/custom_style.css"
    </head>
    <body>
    <div class="container">
        <h1>Yes it works!</h1>
    </div>
    </body>
    </html>
<?php
} else {
    header("Location: ../../index.php");
}
?>