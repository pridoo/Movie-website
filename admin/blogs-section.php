<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header("location: login.php");
}

include 'includes/blogs.php';
$records = json_decode(get($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogs Page</title>
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
                <h2>Published Blogs</h2>
                <a href="add-blog.php" class="btn btn-info">+Create new post +</a>
                <br></br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        sort($records);
                        foreach ($records as $record) {
                            echo "
                                    <tr>
                                    <td>$record->title</td>
                                    <td>$record->content</td>
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