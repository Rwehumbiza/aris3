<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartcard Signup</title>
</head>
<body>
    <center>
        <form action="actions/smartcardsignup.act.php" method="post" enctype="multipart/form-data">
            <input style="width: 13.5rem; height: 2rem; border-radius: 5px; " type="text" placeholder="Create a username for your account" name="username" value="<?php echo $_GET['u']; ?>" required><br><br>
            <div style="margin: 0; padding: 0; text-align: center; font-size: 12px;">
                <?php
                    if (isset($_GET['error1'])) {
                        echo '<i style="color: red;">Username arleady exist!! Try again</i>';
                        echo "<br><br>";
                    }
                ?>
            </div>
            <input style="width: 13.5rem; height: 2rem;"  type="file" placeholder="Select Profile Picture" name="profilepic" required><br><br>
            <input style="width: 13.5rem; height: 2rem;"  type="password" placeholder="Create login password" name="psw" required pattern=".{6,}" title="Password must have atleast 6 characters"><br><br>
            <input style="width: 13.5rem; height: 2rem;"  type="password" placeholder="Confirm password" name="cpsw" required><br><br>
            <div style="color: red; margin: 0; padding: 0; text-align: center; font-size: 12px;">
                <?php
                    if (isset($_GET['error'])) {
                        echo "<i>Passwords do not match</i>";
                    }
                    if (isset($_GET['error2'])) {
                        echo "Failed to create account!! Please try again...";
                    }
                ?>
            </div>
            <button name="submit">SIGNUP</button>
        </form>
    </center>
</body>
</html>