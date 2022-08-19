<?php
    session_start();
    include 'actions/smartcarddashboard.act.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php
        echo $_SESSION['username'];
        if (isset($_SESSION['admin'])) {
            echo '  admin';
        } else {
            echo '  staff';
        }
    ?>
    <button><a href="actions/logout.act.php">LOGOUT</a></button>

    <?php if (isset($_SESSION['admin'])) { ?>
    <center>
        <table>
            <i style="color: red;">
            <?php
                if (isset($_GET['deleted'])) {echo 'Account deleted!!';}
                if (isset($_GET['a'])) {echo 'Staff data updated successfully!!';}
                if (isset($_GET['deleteerror'])) {echo 'Failed to delete account!!';}
            ?>
            </i>
            <tbody>
                <tr>
                    <th>Profile Image</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Priviledge</th>
                    <th>Actions</th>
                </tr>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>';
                        echo '<img src="data:image;base64,'. base64_encode($row['profilepic']). '" alt="profileimage" style="width: 100px;">';
                        echo '</td>';
                        echo '<td>';
                        echo $row['username'];
                        echo '</td>';
                        echo '<td>';
                        echo $row['password'];
                        echo '</td>';
                        echo '<td>';
                        if ($row['priviledge'] == null) {
                            echo 'staff';
                        } else {
                            echo $row['priviledge'];
                        }
                        echo '</td>';
                        echo '<td>';?>
                            <a href="smartcardupdate.php?u=<?php echo $row['username']; ?>">Update</a>
                            <a href="actions/smartcarddelete.act.php?u=<?php echo $row['username']; ?>">Delete</a>
                        <?php
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </center>
    <?php } ?>
    
</body>
</html>