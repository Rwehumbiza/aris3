<?php
    include 'database.act.php';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $psw = $_POST['psw'];

        $sql = "SELECT * FROM Smartcard WHERE username = '" . $username . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if($count == 0){
            header('location: ../smartcardlogin.php?error');
            exit();
        }

        if (password_verify($psw, $row['password'])) {
            session_start();
            $_SESSION['username'] = $row['username'];
            header('location: ../smartcarddashboard.php');
        } else {
            header('location: ../smartcardlogin.php?error2');
            exit();
        }

        /*$query = "SELECT * FROM Smartcard WHERE username = '". $username ."' AND password = '". $psw ."'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if($count == 0){
            header('location: ../smartcardlogin.php?error2');
            exit();
        } else {
            session_start();
            $_SESSION['username'] = $row['username'];
            header('location: ../smartcarddashboard.php');
        }*/
    }