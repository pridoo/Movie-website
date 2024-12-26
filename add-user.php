<?php
session_start();

// if(!isset($_SESSION['logged'])) {
//     header("location: login.php");
// }
require 'phpmailer/PHPMailerAutoload.php';
include 'admin/includes/users.php';

if (isset($_POST['add'])) {

    date_default_timezone_set("Singapore");
    $date = date("YmdHis");

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);


    add($conn, $name, $email, $message);
    header("location: add-user.php?submit=success");

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = "cineflixwebsite@gmail.com";
    $mail->Password = 'cineflixwebsite111';

    $mail->setFrom('cineflixwebsite@gmail.com', 'CineFlix');
    $mail->addAddress($email);
    $mail->addReplyTo('cineflixwebsite@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'CineFlix';
    $mail->Body = '
    <div>   
        <h2>Thank you for raising us your concern ' . $name . '.</h2>
        <p style="width: 50%">The information you provided will help us move forward with the next steps. We appreciate the concern you have given us. We will continue working based on the responses you provided.</p>
        <p>Sincerely, Cineflix.</p>
    </div>
    ';

    if (!$mail->send()) {
        return "email couldn't send";
    } else {
        header("location: add-user.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CineFlix - Concern</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
    include_once 'header.php';
    ?>
    <div class="container">
        <div class="contact_container">
            <a href="index.php" class="btn btn_submit btn_back">Back to homepage</a>
            <h1>Contact Us</h2>
                <p>Have question and need to talk to us? Please complete this form and we will get in touch as soon as possible.</p>
                <div class="">
                    <form method="post" enctype="multipart/form-data" class="contact_form">
                        <div class="form-group">
                            <label>Name</label>
                            <br>
                            <input type="text" name="name" required class="input input_contact">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <br>
                            <input type="Email" name="email" required class="input input_contact">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <br>
                            <textarea name="message" style="font-size: 12pt" class="form-control textarea" cols="20" rows="10"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" name="add" value="Submit" class="btn btn_submit btn_submit_contact">
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>
</body>

</html>