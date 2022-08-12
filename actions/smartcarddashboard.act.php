<?php
    include 'database.act.php';

    $sql = 'SELECT * FROM Smartcard';
    $result = mysqli_query($conn, $sql);