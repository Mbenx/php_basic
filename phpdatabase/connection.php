<?php
    $servername = "localhost";
    $username = "root";
    $password = "h3ru@mysql";
    $dbname = "php_basic";

    //create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //check connection
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    } else {
        // echo "Connected Successfully";
    }

?>