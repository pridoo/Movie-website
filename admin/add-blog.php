<?php
    session_start();

    if(!isset($_SESSION['logged'])) {
        header("location: login.php");
    }

    include 'includes/blogs.php';

    if(isset($_POST['add'])) {

        date_default_timezone_set("Singapore");
        $date = date("YmdHis");
        
            $title = $conn->real_escape_string($_POST['title']);
            $content = $conn->real_escape_string($_POST['content']);

            add($conn, $title, $content);
            header("location: blogs-section.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<body style="background-color:mintcream;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Blog</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <br><br>
    <div class="container">
        <a href="blogs-section.php" class="btn btn-primary">Back</a>
        <h2 class="text-center">Create Blog</h2>
        <div class="d-flex justify-content-center">
                <form method="post" enctype="multipart/form-data" class="form">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea type="text" rows="4" cols="50" name="content" required class="form-control"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" name="add" value="Publish" class="form-control btn-primary">
                    </div>
                </form>
        </div>
    </div>
</body>
</html>