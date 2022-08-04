<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARIS 3</title>
</head>
<body>
    <?php
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['psw'];
    ?>

    <form style="text-align: center;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" placeholder="Name" name="name" value="<?php echo $name; ?>" required><br><br>
        <input type="text" placeholder="email" name="email"  value="<?php echo $email; ?>" required><br><br>
        <input type="password" placeholder="password" name="psw" value="<?php echo $password; ?>" required><br><br>
        <button name="submit">LOGIN</button>
    </form>

    <center>
    <?php
        if (isset($_POST['submit']) && $name <> "" && $email <> "" && $password <> "") {
            echo "<br>";
            echo "<br>";
            echo "My name is " . $_POST['name'];
            echo "<br>";
            echo "Email: ".$_POST['email'];
            echo "<br>";
            echo "Password: ".$_POST['psw'];
        }
    ?>
    </center>
    
</body>
</html>