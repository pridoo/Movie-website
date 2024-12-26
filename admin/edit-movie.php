<?php
    session_start();

    if(!isset($_SESSION['logged'])) {
        header("location: login.php");
    }
    if(!isset($_GET['id'])) {
        header("location: movies-section.php");
    }

    include 'includes/movies.php';
    $id = $_GET['id'];
    $record = json_decode(getMovieID($conn, $id));

    if(isset($_POST['update'])) {
        date_default_timezone_set("Singapore");
        $date = date("YmdHis");
        $movie_pic = $date . $_FILES['myFile']['name'];
        $tempname = $_FILES['myFile']['tmp_name'];

        $movie_name = $conn->real_escape_string($_POST['movie_name']);
        $theme = $conn->real_escape_string($_POST['theme']);
        $movie_price = $conn->real_escape_string($_POST['movie_price']);

        if ($tempname != null ) {
            unlink("images/movies/" . $record[0]->movie_pic);
            move_uploaded_file($tempname, "images/movies/$movie_pic");
            updateMovie($conn, $movie_name, $theme, $movie_pic, $movie_price, $id);
            header("location: movies-section.php");
        }
        else{
            updateMovie($conn, $movie_name, $theme, $record[0]->movie_pic, $movie_price, $id);
            header("location: movies-section.php");
        }
        
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Movie Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
        <br>
        <div class="container">
        <a href="movies-section.php" class="btn btn-primary">Back</a>

        <h2 class="text-center">Update Movie</h2>
        <div class="d-flex justify-content-center">
            <form method="post" enctype="multipart/form-data" class="form">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="movie_name" required class="form-control"
                        value="<?php echo $record[0]->movie_name; ?>">
                </div>
                <div class="form-group">
                    <label>Theme</label>
                    <input type="text" name="theme" required class="form-control"
                        value="<?php echo $record[0]->theme; ?>">
                </div>
                <div class="form-group">
                    <label>Picture </label>
                    <input type="file" name="myFile" class="form-control">  
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="movie_price" required class="form-control"
                        value="<?php echo $record[0]->movie_price; ?>">
                </div>

                <div class="form-group">
                    <input type="submit" name="update" value="Update Movie" class="form-control btn-warning">
                </div>
            </form>
        </div>
    </div>
</body>
</html>