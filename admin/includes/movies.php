<?php  
    require 'connection.php';

    //movies functions

    function getMovie($conn) { 
        $query = "SELECT * FROM movies";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }


    function addMovie($conn, $movie_name, $theme, $movie_pic, $movie_price) {
        $query = 
            "INSERT INTO movies
            SET
                `movie_name` = '$movie_name',
                `theme` = '$theme',
                `movie_pic` = '$movie_pic',
                `movie_price` = '$movie_price'";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }

    function getMovieID($conn, $id) {
        $query = "SELECT * FROM movies
            WHERE `id` = '$id'";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }

    function updateMovie($conn, $movie_name, $theme, $movie_pic, $movie_price, $id) {
        $query = 
            "UPDATE movies
            SET
                `movie_name` = '$movie_name',
                `theme` = '$theme',
                `movie_pic` = '$movie_pic',
                `movie_price` = '$movie_price'
            WHERE
                `id` = '$id'";
        if($conn->query($query)) {
            return "updated";
        } else {
            return "failed";
        }
    }

    function deleteMovie($conn, $id) {
        $query = "DELETE FROM movies WHERE `id` = '$id'";
        if($conn->query($query)) {
            return "deleted";
        } else {
            return "failed";
        }
    }
?>