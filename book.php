<?php
session_start();
// if(!isset($_SESSION['logged'])) {
//     header("location: login.php");
// }

$customerName = $_SESSION['customer_name'];
$orderedMovie = $_SESSION['customer_order_movie'];
$orderedFood = $_SESSION['customer_order_food'];
$orderQuantity = $_SESSION['customer_order_quantity'];
$totalPrice = $_SESSION['customer_order_total'];

include 'admin/includes/book_form.php';
$records = json_decode(get($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CineFlix - Enjoy your movies and food!</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
    include_once 'header.php';
    ?>

    <div class="container">

        <div class="book_done_container">
            <div class="book_summary">
                <h2>Enjoy the movie and foods
                    <?php
                    echo $customerName . '!';
                    ?>
                </h2>
                <h2>Your order summary</h2>
                <h3>Movie:
                    <?php
                    echo $orderedMovie;
                    ?>
                </h3>
                <h3>Food:
                    <?php
                    echo $orderedFood;
                    ?>
                </h3>
                <h3>Quantity:
                    <?php
                    echo $orderQuantity;
                    ?>
                </h3>
                <h3>Total Price:
                    <?php
                    echo 'P'. $totalPrice . '.00';
                    ?>
                </h3>
            </div>
            <div class="book_again">
                <p>Book again?</p>
                <a href="add-book.php" class="btn btn_submit">Go back to booking page</a>
            </div>

        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>
</body>

</html>