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
    echo delete($conn, $id);
    header("location: blogs-section.php");
?>