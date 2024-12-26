<?php
    session_start();

    if(!isset($_SESSION['logged'])) {
        header("location: login.php");
    }

    include 'includes/packages.php';

    if(isset($_POST['add'])) {

        date_default_timezone_set("Singapore");
        $date = date("YmdHis");
        $package_pic = $date . $_FILES['myFile']['name'];
        $tempname = $_FILES['myFile']['tmp_name'];
                
        if(move_uploaded_file($tempname, "images/foods/$package_pic")) {
            $package_name = $conn->real_escape_string($_POST['package_name']);
            $package_price = $conn->real_escape_string($_POST['package_price']);

            addPackage($conn, $package_pic, $package_name, $package_price);
            header("location: package-section.php");
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
    <title>Add Package Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <br><br>
    <div class="container">
        <a href="package-section.php" class="btn btn-primary">Back</a>
        
        <h2 class="text-center">Add Package</h2>
        <div class="d-flex justify-content-center">
                <form method="post" enctype="multipart/form-data" class="form">
                    <div class="form-group">
                        <label>Package Photo</label>
                        <input type="file" name="myFile" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Package Name</label>
                        <input type="text" name="package_name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Package Price</label>
                        <input type="number" name="package_price" required class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add" value="SUBMIT" class="form-control btn-primary">
                    </div>
                </form>
        </div>
    </div>
</body>
</html>