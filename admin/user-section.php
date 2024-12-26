<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header("location: login.php");
}

include 'includes/users.php';
$records = json_decode(get($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Customer Concerns</title>
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
                <h2>Users Concerns</h2>
                <br></br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                        </tr>
                    </thead>

                    <?php
                    sort($records);
                    foreach ($records as $record) {
                        echo "
                                <tr>            
                                <td>$record->name</td>
                                <td>$record->email</td>
                                <td>$record->message</td>
                                </tr>
                            ";
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>
</body>

</html>