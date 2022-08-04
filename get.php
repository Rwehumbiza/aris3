<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get</title>
</head>
<body>
    <?php
        echo "My name is " . $_REQUEST['name'] . ". I am a " . $_GET['email'] . " citizen";
        echo "<br>";
        echo $_POST['psw']." : You must be a female citizen!";
    ?>
</body>
</html>