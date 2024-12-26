<?php  
    require 'connection.php';

    //movies functions

    function get($conn) { 
        $query = "SELECT * FROM blogs";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }


    function add($conn, $title, $content) {
        $query = 
            "INSERT INTO blogs
            SET
                `title` = '$title',
                `content` = '$content'";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }

     function get_id($conn, $id) {
        $query = "SELECT * FROM blogs
            WHERE `id` = '$id'";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }

    function update($conn, $title, $content, $id) {
        $query = 
            "UPDATE blogs
            SET
                `title` = '$title',
                `content` = '$content'
            WHERE
                `id` = '$id'";
        if($conn->query($query)) {
            return "updated";
        } else {
            return "failed";
        }
    }

    function delete($conn, $id) {
        $query = "DELETE FROM blogs WHERE `id` = '$id'";
        if($conn->query($query)) {
            return "deleted";
        } else {
            return "failed";
        }
    }
?>