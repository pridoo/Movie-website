<?php
    session_start();

    if(!isset($_SESSION['logged'])) {
        header("location: login.php");
    }
    if(!isset($_GET['id'])) {
        header("location: blogs-section.php");
    }

    include 'includes/blogs.php';
    $id = $_GET['id'];
    $record = json_decode(get_id($conn, $id));

    if(isset($_POST['update'])) {
        date_default_timezone_set("Singapore");
        $date = date("YmdHis");

        $title = $conn->real_escape_string($_POST['title']);
        $content = $conn->real_escape_string($_POST['content']);

        if ($content != null ) {
            $content = $content;
        }
        else{
            $content = $record[0]->content;
        }
            update($conn, $title, $content, $id);
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
    <title>Edit Blog</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
        <br>
        <div class="container">
        <a href="blogs-section.php" class="btn btn-primary">Back</a>

        <h2 class="text-center">Update Post</h2>
        <div class="d-flex justify-content-center">
            <form method="post" enctype="multipart/form-data" class="form">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" required class="form-control"
                        value="<?php echo $record[0]->title; ?>">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea type="text" rows="4" cols="50" name="content" required class="form-control">
                        <?php echo $record[0]->content; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="update" value="Publish" class="form-control btn-warning">
                </div>
            </form>
        </div>
    </div>
</body>
</html>