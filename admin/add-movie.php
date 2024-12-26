<?php
    session_start();

    if(!isset($_SESSION['logged'])) {
        header("location: login.php");
    }

    include 'includes/movies.php';

    if(isset($_POST['add'])) {

        date_default_timezone_set("Singapore");
        $date = date("YmdHis");
        $movie_pic = $date . $_FILES['myFile']['name'];
        $tempname = $_FILES['myFile']['tmp_name'];
        
        if(move_uploaded_file($tempname, "images/movies/$movie_pic")) {
            $movie_name = $conn->real_escape_string($_POST['movie_name']);
            $theme = $conn->real_escape_string($_POST['theme']);
            $movie_price = $conn->real_escape_string($_POST['movie_price']);

            addMovie($conn, $movie_name, $theme, $movie_pic, $movie_price);
            header("location: movies-section.php");
        } else {
            echo "failed";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <br><br>
    <div class="container">
        <a href="movies-section.php" class="btn btn-primary">Back</a>
        
        <h2 class="text-center">Add Movie</h2>
        <div class="d-flex justify-content-center">
                <form method="post" enctype="multipart/form-data" class="form">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="movie_name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Theme</label>
                        <input type="text" name="theme" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" name="myFile" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="movie_price" required class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add" value="SUBMIT" class="form-control btn-primary">
                    </div>
                </form>
        </div>
    </div>
</body>
</html>