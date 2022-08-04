<?php
    $servername = "localhost";
    $username = "root";
    $psw = "root";
    $db = "ARIS";

    $conn = new mysqli($servername, $username, $psw, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }