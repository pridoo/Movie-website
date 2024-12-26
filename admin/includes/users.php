<?php  
    require 'connection.php';

    //movies functions

    function get($conn) { 
        $query = "SELECT * FROM concern";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }


    function add($conn, $name, $email, $message) {
        $query = 
            "INSERT INTO concern
            SET
                `name` = '$name',
                `email` = '$email',
                `message` = '$message'";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }


?>