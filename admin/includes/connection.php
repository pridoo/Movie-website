<?php 

    $host = "localhost"; 
    $username = "root";
    $password = "";
    $db = "web_movie";

    $conn = new mysqli($host, $username, $password, $db);

    if($conn->error) {
        echo "failed to connect";
    } 
    else{
        //echo "connected";
    }

?>