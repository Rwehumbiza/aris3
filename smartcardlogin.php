<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartcard Login</title>
</head>
<body>
    <center>
        <div style="margin: 0; padding: 0; text-align: center; font-size: 12px;">
            <?php
                if (isset($_GET['success'])) {
                    echo '<i style="color: green;">Account created successfully!! Login to continue</i>';
                    echo "<br><br>";
                }
                if (isset($_GET['logout'])) {
                    echo '<i style="color: green;">Successfully logged out!!</i>';
                    echo "<br><br>";
                }
            ?>
        </div>

        <form action="actions/smartcardlogin.act.php" method="post">
            <input type="text" placeholder="Input username" name="username" value="<?php echo $_GET['u']; ?>" required><br><br>
            <div style="margin: 0; padding: 0; text-align: center; font-size: 12px;">
                <?php
                    if (isset($_GET['error'])) {
                        echo '<i style="color: red;">Account does not exist!!</i>';
                        echo "<br><br>";
                    }
                ?>
            </div>
            <input type="password" placeholder="Input password" name="psw" required><br><br>
            <div style="color: red; margin: 0; padding: 0; text-align: center; font-size: 12px;">
                <?php
                    if (isset($_GET['error2'])) {
                        echo "Incorrect password!! Please try again...";
                    }
                ?>
            </div>
            <button name="submit">LOGIN</button>
        </form>

    </center>
</body>
</html>