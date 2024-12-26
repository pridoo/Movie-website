<?php  
    require 'connection.php';

    //movies functions

    function get($conn) { 
        $query = "SELECT * FROM book_db";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }


    function add($conn, $name, $email, $phonenumber, $address, $movie, $packages, $quantity) {
        $query = 
            "INSERT INTO book_db
            SET
                `name` = '$name',
                `email` = '$email',
                `phonenumber` = '$phonenumber',
                `address` = '$address',
                `movie` = '$movie',
                `packages` = '$packages',
                `quantity` = '$quantity'";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }


?>