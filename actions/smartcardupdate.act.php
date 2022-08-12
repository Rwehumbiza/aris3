<?php
    session_start();
    include 'database.act.php';

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, stripcslashes($_POST['username']));
        $psw = mysqli_real_escape_string($conn, stripcslashes($_POST['psw']));
        $cpsw = mysqli_real_escape_string($conn, stripcslashes($_POST['cpsw']));
        
        if ($cpsw !== $psw) {
            header("location: ../smartcardupdate.php?error");
            exit();
        }

        if ($username !== "") {
            $sql = "SELECT username FROM Smartcard WHERE username = '" . $username . "'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if($count > 0) {
                header('location: ../smartcardupdate.php?error1');
                exit();
            }
            $sqll = "UPDATE Smartcard SET username = '$username' WHERE username = '". $_SESSION['staff'] ."'";
            $resultt = mysqli_query($conn, $sqll);
            if (!$resultt) {
                header("location: ../smartcardupdate.php?error2");
                exit();
            }
        }

        if ($psw !== "") {
            $sqli = "UPDATE Smartcard SET password = '". password_hash($psw, PASSWORD_DEFAULT) ."' WHERE username = '". $_SESSION['staff'] ."'";
            $resulti = mysqli_query($conn, $sqli);
            if (!$resulti) {
                header("location: ../smartcardupdate.php?error2");
                exit();
            }
        }
    }

    header('location: ../smartcarddashboard.php?a');