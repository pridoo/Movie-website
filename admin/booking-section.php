<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header("location: login.php");
}

include 'includes/book_form.php';
$records = json_decode(get($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Package List Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <?php
        include_once 'admin-header.php';
        ?>
        <div class="row">
            <div class="row">
                <div class="col">
                    <br>
                    <h2>Booking List</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Movie</th>
                                <th>Packages</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            sort($records);
                            foreach ($records as $record) {
                                echo "
                                    <tr>
                                    <td>$record->name</td>
                                    <td>$record->email</td>
                                    <td>$record->phonenumber</td>
                                    <td>$record->address</td>
                                    <td>$record->movie</td>
                                    <td>$record->packages</td>
                                    <td>$record->quantity</td>
                                    </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>

</html>