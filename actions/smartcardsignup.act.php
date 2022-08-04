<?php
    include "database.act.php";
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $psw = $_POST['psw'];
        $cpsw = $_POST['cpsw'];

        if ($cpsw !== $psw) {
            header("location: ../smartcardsignup.php?error&u=$username");
            exit();
        } else {
            $sql = "INSERT INTO Smartcard VALUES ('$username', '$psw')";
            if (mysqli_query($conn, $sql)) {
                header("location: ../smartcardlogin.php?success");
            } else {
                header("location: ../smartcardsignup.php?error2&u=$username");
                exit();
            }
        }
    }