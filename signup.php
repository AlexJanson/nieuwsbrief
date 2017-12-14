<?php

include_once('includes/connection.php');

if(isset($_POST['btn_upload'])) {
    $email_address = $_POST['email_address'];
    // check if e-mail address is well-formed
    if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        $feedback = "Invalid email format!";
    } else {

        if (empty($email_address)) {
            $feedback = 'All fields are required!';
        } else {
            $sql = "INSERT INTO maillist (mail_name) VALUES ('$email_address')";
//        $result = $conn->prepare($sql);
            $result = $conn->query($sql);

            if ($result > 0) {
                $pfeedback = 'Your email has been registered!';

                $from = "nieuwsbrief@webapp.nl";
                $email = $email_address;
                $subject = 'Nieuwsbrief registering email';
                $message = 'Thank you for registering to: Nieuwsbrief Webapp - Alex Janson. https://24272.hosts.ma-cloud.nl/ma/bewijzenmap/nieuwsbrief';

                mail($email, $subject, $message, "From:" . $from);

                $from = "nieuwsbrief@webapp.nl";
                $email = "kingjoal1337@gmail.com";
                $subject = 'Nieuwsbrief register';
                $message = "$email_address has registered. https://24272.hosts.ma-cloud.nl/ma/bewijzenmap/nieuwsbrief";

                mail($email, $subject, $message, "From:" . $from);

//                print "Your message has been sent to: </br>$email</p>";
            } else {
                $feedback = 'This email address is already registered!';
            }
        }
    }
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
                    <input type="submit" name="btn_upload" value="Sign up">
                </form>
            </div>
            <a href="index.php"><button>&larr; Back</button></a>
        </div>
    </div>
</div>
</body>
</html>
