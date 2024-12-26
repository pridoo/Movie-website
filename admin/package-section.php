<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header("location: login.php");
}

include 'includes/packages.php';
$records = json_decode(getPackage($conn));

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
            <div class="col">
                <br>
                <h2>Package List</h2>
                <a href="add-package.php" class="btn btn-info">Add Package</a>
                <br></br>
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        sort($records);
                        foreach ($records as $record) {
                            echo "
                                    <tr>
                                    <td><img src='images/foods/$record->package_pic' height='150px' width='150px'></td>
                                    <td>$record->package_name</td>
                                    <td>$record->package_price</td>
                                    <td>
                                        <a href='edit-package.php?id=$record->id' class='btn btn-warning'>Update</a>
                                        <a href='delete-package.php?id=$record->id' class='btn btn-danger'>Delete</a>
                                    </td>
                                ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>