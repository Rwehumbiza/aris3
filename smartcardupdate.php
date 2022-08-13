<?php
    session_start();
    $_SESSION['staff'] = $_GET['u'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update staff</title>
</head>
<body>
    <center>
        <form action="actions/smartcardupdate.act.php" method="post">
            Initial name = <?php echo $_SESSION['staff'];?><br>
            <input style="width: 13.5rem; height: 2rem; border-radius: 5px; " type="text" placeholder="Update username" name="username"><br><br>
            <div style="margin: 0; padding: 0; text-align: center; font-size: 12px;">
                <?php
                    if (isset($_GET['error1'])) {
                        echo '<i style="color: red;">Username arleady exist!! Try again</i>';
                        echo "<br><br>";
                    }
                ?>
            </div>
            <input style="width: 13.5rem; height: 2rem;"  type="password" placeholder="Update login password" name="psw" pattern=".{6,}" title="Password must have atleast 6 characters"><br><br>
            <input style="width: 13.5rem; height: 2rem;"  type="password" placeholder="Confirm password" name="cpsw"><br><br>
            <div style="color: red; margin: 0; padding: 0; text-align: center; font-size: 12px;">
                <?php
                    if (isset($_GET['error'])) {
                        echo "<i>Passwords do not match</i>";
                    }
                    if (isset($_GET['error2'])) {
                        echo "Failed update!! Please try again...";
                    }
                    if (isset($_GET['error3'])) {
                        echo "No data submitted";
                    }
                ?>
            </div>
            <button name="submit">UPDATE</button>
        </form>
    </center>
</body>
</html>