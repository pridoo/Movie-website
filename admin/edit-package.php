<?php
    session_start();

    if(!isset($_SESSION['logged'])) {
        header("location: login.php");
    }
    if(!isset($_GET['id'])) {
        header("location: package-section.php");
    }

    include 'includes/packages.php';
    $id = $_GET['id'];
    $record = json_decode(getPackageID($conn, $id));

    if(isset($_POST['update'])) {
        date_default_timezone_set("Singapore");
        $date = date("YmdHis");
        $package_pic = $date . $_FILES['myFile']['name'];
        $tempname = $_FILES['myFile']['tmp_name'];

        $package_name = $conn->real_escape_string($_POST['package_name']);
        $package_price = $conn->real_escape_string($_POST['package_price']);

        if ($tempname != null ) {
            unlink("images/foods/" . $record[0]->package_pic);
            move_uploaded_file($tempname, "images/foods/$package_pic");
            updatePackage($conn, $package_pic, $package_name, $package_price, $id);
            header("location: package-section.php");
        }
        else{
            updatePackage($conn, $record[0]->package_pic, $package_name, $package_price, $id);
            header("location: package-section.php");
        }
        
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Package Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
        <br>
        <div class="container">
        <a href="package-section.php" class="btn btn-primary">Back</a>

        <h2 class="text-center">Update Package</h2>
        <div class="d-flex justify-content-center">
            <form method="post" enctype="multipart/form-data" class="form">
            <div class="form-group">
                    <label>Package Photo </label>
                    <input type="file" name="myFile" class="form-control">  
                </div>
                <div class="form-group">
                    <label>Package Name</label>
                    <input type="text" name="package_name" required class="form-control"
                        value="<?php echo $record[0]->package_name; ?>">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="package_price" required class="form-control"
                        value="<?php echo $record[0]->package_price; ?>">
                </div>

                <div class="form-group">
                    <input type="submit" name="update" value="Update Package" class="form-control btn-warning">
                </div>
            </form>
        </div>
    </div>
</body>
</html>