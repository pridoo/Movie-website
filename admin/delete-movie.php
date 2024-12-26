<?php    
    session_start();

    if(!isset($_SESSION['logged'])) {
        header("location: login.php");
    }
    if(!isset($_GET['id'])) {
        header("location: movies-section.php");
    }

    include 'includes/movies.php';
    $id = $_GET['id'];

    $record = json_decode(getMovieID($conn, $id));
    unlink("images/movies/" . $record[0]->movie_pic);
    echo deleteMovie($conn, $id);
    header("location: movies-section.php");
?>