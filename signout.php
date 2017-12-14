<?php

include_once('includes/connection.php');

if(isset($_POST['email_address'])) {
    $email_address = $_POST['email_address'];

    $servername = "localhost";
    $username = "adminalex";
    $password = "skjafooh";
    $dbname = "24272_maillist";

    $db = new mysqli($servername, $username, $password, $dbname);

    if ($db->query("SELECT mail_name FROM maillist WHERE mail_name='".$email_address."'")->num_rows > 0) {
        if ($db->query("DELETE FROM maillist WHERE mail_name='".$email_address."'")->affected_rows > 0) {
//            echo 'Rows have not been removed.';
            $feedback = 'Error';
        } else {
//            echo 'Rows have been removed.';
            $pfeedback = 'Successfully singed out the email address!';

            $from = "nieuwsbrief@webapp.nl";
            $email = $email_address;
            $subject = 'Nieuwsbrief unregistering email';
            $message = 'You have successfully unregistered your email account. https://24272.hosts.ma-cloud.nl/ma/bewijzenmap/nieuwsbrief';

            mail($email, $subject, $message, "From:" . $from);

            $from = "nieuwsbrief@webapp.nl";
            $email = "kingjoal1337@gmail.com";
            $subject = 'Nieuwsbrief register';
            $message = "$email_address has UNregistered. https://24272.hosts.ma-cloud.nl/ma/bewijzenmap/nieuwsbrief";

            mail($email, $subject, $message, "From:" . $from);
        }
    } else {
//        echo 'There are no rows identified by given value.';
        $feedback = 'This email address is not yet registered!';
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwsbrief Webapp | Sign out</title>
    <link rel="stylesheet" href="assets/custom_style.css"
</head>
<body>
<div class="container">
    <div class="center-content">
        <div class="main-content">
            <div class="form">
                <?php if (isset($feedback)) { ?>
                    <small style="color: #aa0000;"><?php echo $feedback; ?></small>
                    <br /><br />
                <?php } ?>
                <?php if (isset($pfeedback)) { ?>
                    <small style="color: #00ff00;"><?php echo $pfeedback; ?></small>
                    <br /><br />
                <?php } ?>
                <form action="" method="post" autocomplete="off">
                    <input type="text" name="email_address" placeholder="Email address" autofocus/><br /><br />
                    <input type="submit" name="btn_upload" value="Sign out">
                </form>
            </div>
            <a href="index.php"><button>&larr; Back</button></a>
        </div>
    </div>
</div>
</body>
</html>
