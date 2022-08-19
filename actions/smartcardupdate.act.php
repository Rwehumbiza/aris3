<?php
    session_start();
    include 'database.act.php';

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, stripcslashes($_POST['username']));
        $psw = mysqli_real_escape_string($conn, stripcslashes($_POST['psw']));
        $cpsw = mysqli_real_escape_string($conn, stripcslashes($_POST['cpsw']));
        
        $sql = "SELECT username FROM Smartcard WHERE username = '" . $username . "'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        $error = 0;
        if ($cpsw !== $psw) { $error = 1; }
        if ($count > 0) { $error = 2; }
        if (($cpsw !== $psw) && ($count > 0)) { $error = 3; }

        switch ($error) {
            case 1:
                header('location: ../smartcardupdate.php?error');
                break;
            case 2:
                header('location: ../smartcardupdate.php?error1');
                break;
            case 3:
                header('location: ../smartcardupdate.php?error&error1');
                break;
            default:
                if (empty($username) && empty($psw)) {
                    header("location: ../smartcardupdate.php?error3");
                }
                if ($username) {
                    $sqll = "UPDATE Smartcard SET username = '$username' WHERE username = '". $_SESSION['staff'] ."'";
                    $resultt = mysqli_query($conn, $sqll);
                    if (!$resultt) {
                        header("location: ../smartcardupdate.php?error2");
                    }
                }

                if ($psw) {
                    $sqli = "INSERT INTO Smartcard (password) VALUES ('". password_hash($psw, PASSWORD_DEFAULT) ."') WHERE username = '". $_SESSION['staff'] ."'";
                    $resulti = mysqli_query($conn, $sqli);
                    if (!$resulti) {
                        header("location: ../smartcardupdate.php?error2");
                    }
                }

                header('location: ../smartcarddashboard.php?a');
        }
    }