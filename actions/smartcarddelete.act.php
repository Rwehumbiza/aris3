<?php
    session_start();
    include 'database.act.php';

    if (isset($_GET['u'])) {
        $username = mysqli_real_escape_string($conn, stripcslashes($_GET['u']));
        $sql = "DELETE FROM Smartcard WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location: ../smartcarddashboard.php?deleted');
        } else {
            header('location: ../smartcarddashboard.php?deleteerror');
        }
    } else {
        header('location: ../smartcarddashboard.php');
    }