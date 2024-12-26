<?php
session_start();
if(!isset($_SESSION['logged'])) {
    header("location: login.php");
}

include 'includes/admin.php';
$records = json_decode(get($conn));

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Admin - Home</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <?php
    include_once 'admin-header.php';
    ?>
    <br>
    <h2> Movie Reservation Website </h2><br>
    <?php  if (isset($_SESSION['username'])) : ?>
        <h2> Welcome Admin
            <strong> <?php echo $_SESSION['username'];?> </strong>
        </h2>
    <?php endif ?>
</body>
</html>