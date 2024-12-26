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
    unlink("images/foods" . $record[0]->package_pic);
    echo deletePackage($conn, $id);
    header("location: package-section.php");
?>