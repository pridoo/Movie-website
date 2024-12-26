<?php  
    require 'connection.php';

    //movies functions

    function getPackage($conn) { 
        $query = "SELECT * FROM packages";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }


    function addPackage($conn, $package_pic, $package_name, $package_price) {
        $query = 
            "INSERT INTO packages
            SET
                `package_pic` = '$package_pic',
                `package_name` = '$package_name',
                `package_price` = '$package_price'";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }

    function getPackageID($conn, $id) {
        $query = "SELECT * FROM packages
            WHERE `id` = '$id'";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }

    function updatePackage($conn, $package_pic, $package_name, $package_price, $id) {
        $query = 
            "UPDATE packages
            SET
                `package_pic` = '$package_pic',
                `package_name` = '$package_name',
                `package_price` = '$package_price'
            WHERE
                `id` = '$id'";
        if($conn->query($query)) {
            return "updated";
        } else {
            return "failed";
        }
    }

    function deletePackage($conn, $id) {
        $query = "DELETE FROM packages WHERE `id` = '$id'";
        if($conn->query($query)) {
            return "deleted";
        } else {
            return "failed";
        }
    }
?>