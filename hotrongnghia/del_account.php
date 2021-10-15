<!DOCTYPE html>
<html lang="en">
<body>
    <?php
    require_once "connect_db.php";

    $sql =<<<EOF
     SELECT * FROM my_accounts;
    EOF;
    $ret = pg_query($db, $sql);
    if (!$ret) {
        echo pg_last_error($db);
        exit();
    }
    ?>
    <table border="1" cellspacing="2" cellpadding="2">
    <tr><td>Username</td><td>Password</td></tr>
    
    <?php
    while ($myrow = pg_fetch_assoc($ret)) { 
    ?>
        <tr>
            <td><?php echo $myrow['username']; ?></td>
            <td><?php echo $myrow['password']; ?></td>
            <td><a href="del.php?username=<?php echo $myrow['username'] ?>">Delete</a></td>
        </tr>
    <?php
    }
    pg_close($db);
    ?>
    </table>
    <BR><a href="index.php">HOME</a>
</body> 
</html>