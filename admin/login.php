<?php
    session_start();

    if(isset($_SESSION['logged'])) {
    }

    include 'includes/admin.php';

    if(isset($_POST['submit'])) {
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        $password = md5($password);
        $res = json_decode(admin($conn, $username, $password));
        if(sizeof($res) > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['logged'] = true;
            $_SESSION['id'] = $res[0]->id;
            header("location: admin-interface.php");
        }
    }
?>

<!DOCTYPE html>
<body style="background-color: white;">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Section</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <br><br>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-4">
                <h2 class="text-center">Login</h2>
                <form method="post" class="form">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Login" class="form-control btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>