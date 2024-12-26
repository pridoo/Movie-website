<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header("location: login.php");
}

include 'includes/movies.php';
$records = json_decode(getMovie($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies Section</title>
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
                <h2>Movies List</h2>
                <a href="add-movie.php" class="btn btn-info">Add Movie</a>
                <br></br>
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Theme</th>
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
                                    <td><img src='images/movies/$record->movie_pic' height='150px' width='150px'></td>
                                    <td>$record->movie_name</td>
                                    <td>$record->theme</td>
                                    <td>$record->movie_price</td>
                                    <td>
                                        <a href='edit-movie.php?id=$record->id' class='btn btn-warning'>Update</a>
                                        <a href='delete-movie.php?id=$record->id' class='btn btn-danger'>Delete</a>
                                    </td>
                                    </tr>
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