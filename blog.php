<?php
session_start();
// if(!isset($_SESSION['logged'])) {
//     header("location: login.php");
// }

include 'admin/includes/blogs.php';
$records = json_decode(get($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CineFlix - Blogs</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php
    include_once 'header.php';
    ?>
    <div class="container">

        <div class="blog_container">
            <h2>Blogs</h2>
            <table class="table_blog">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                    </tr>
                </thead>

                <tbody class="tbody_blog">
                    <?php
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
    <?php
    include_once 'footer.php';
    ?>
</body>

</html>