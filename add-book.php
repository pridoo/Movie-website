<?php
session_start();
// if(!isset($_SESSION['logged'])) {
//     header("location: login.php");
// }

require 'phpmailer/PHPMailerAutoload.php';
include 'admin/includes/book_form.php';
include 'admin/includes/movies.php';
include 'admin/includes/packages.php';

$movies = json_decode(getMovie($conn));
$packages = json_decode(getPackage($conn));

if (isset($_POST['add'])) {

    $movie_values = $conn->real_escape_string($_POST['movie']);
    $package_values = $conn->real_escape_string($_POST['packages']);

    $movie_explode = explode('|', $movie_values);
    $package_explode = explode('|', $package_values);

    date_default_timezone_set("Singapore");
    $date = date("Y-m-d H:i:s");

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phonenumber = $conn->real_escape_string($_POST['phonenumber']);
    $address = $conn->real_escape_string($_POST['address']);
    // $movie = $conn->real_escape_string($_POST['movie']);
    // $packages = $conn->real_escape_string($_POST['packages']);
    $movie = $movie_explode[0];
    $packages = $package_explode[0];
    $quantity = $conn->real_escape_string($_POST['quantity']);

    $_SESSION['customer_name'] = $name;
    $_SESSION['customer_order_movie'] = $movie;
    $_SESSION['customer_order_food'] = $packages;
    $_SESSION['customer_order_quantity'] = $quantity;

    add($conn, $name, $email, $phonenumber, $address, $movie, $packages, $quantity);

    $moviePrice = (int)$movie_explode[1] * (int)$quantity;
    $packagePrice = (int)$package_explode[1];
    $totalPrice = $moviePrice + $packagePrice;

    $_SESSION['customer_order_total'] = $totalPrice;

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
    $mail->Subject = 'CineFlix Booking';
    $mail->Body = '
    <div>   
        <h2>Thank you for ordering!</h2> 
        <h2>Enjoy the movie and foods ' . $name . '.
        </h2>
        <h2>Your order summary</h2>
        <h3>Movie: ' . $movie .
        '</h3>
        <h3>Food: ' . $packages .
        '</h3>
        <h3>Quantity: ' . $quantity .
        '</h3>
        <h3>Total Price: P' . $totalPrice . '.00' .
        '</h3>
        <h3>Date ordered: ' . $date .
        '</h3>
    </div>
    ';

    if (!$mail->send()) {
        return "email couldn't send";
    } else {
        header("location: book.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>CineFlix - Movies & Food Booking</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>


<body>

    <?php
    include_once 'header.php';
    ?>

    <div class="container">
        <div class="booking_container">
            <a href="index.php" class="btn btn_submit btn_back">Back to homepage</a>
            <h2 class="">Book your movies now together with some food package!</h2>
            <div class="form_container">
                <form method="post" enctype="multipart/form-data" class="booking_form">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" required class="input">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="Email" name="email" required class="input">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phonenumber" required class="input">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" required class="input">
                    </div>
                    <div class="form-group">
                        <label>Movie</label>
                        <select name="movie" required class="movie_select input">
                            <option selected disabled>Select Movie</option>
                            <?php
                            foreach ($movies as $movie) {
                                echo "<option value='$movie->movie_name" . " | $movie->movie_price" . "'>$movie->movie_name " . " P"  . $movie->movie_price . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Packages</label>
                        <select name="packages" required class="package_select input">
                            <option selected disabled>Select Food Package</option>
                            <?php
                            foreach ($packages as $package) {
                                echo "<option value='$package->package_name" . " | $package->package_price" . "'>$package->package_name " . " P"  . $package->package_price . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Number of Tickets</label>
                        <input type="text" name="quantity" required class="input">
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" name="add" class="btn btn_submit btn_submit_book"><span><i class="fas fa-cart-plus"></i></span>Book Now!</button>
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