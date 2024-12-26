<?php  
    require 'connection.php';

    //admin functions

    function admin($conn, $username, $password) {
        $query = "SELECT * FROM admin
            WHERE
                `username` = '$username' AND
                `password` = '$password'";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }

    function get($conn) { 
        $query = "SELECT * FROM admin";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }


    function add($conn, $name, $username, $password, $admin_pic) {
        $query = 
            "INSERT INTO admin
            SET
                `name` = '$name',
                `username` = '$username',
                `password` = '$password',
                `admin_pic` = '$admin_pic";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }

    function get_id($conn, $Admin_No) {
        $query = "SELECT * FROM admin
            WHERE `id` = '$Admin_No'";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }

    function update($conn, $name, $username, $password, $admin_pic, $Admin_No) {
        $query = 
            "UPDATE admin
            SET
                `name` = '$name',
                `username` = '$username',
                `password` = '$password',
                `admin_pic` = '$admin_pic',
            WHERE
                `id` = '$Admin_No'";
        if($conn->query($query)) {
            return "updated";
        } else {
            return "failed";
        }
    }

    function delete($conn, $Admin_No) {
        $query = "DELETE FROM login WHERE `id` = '$Admin_No'";
        if($conn->query($query)) {
            return "deleted";
        } else {
            return "failed";
        }
    }
?>