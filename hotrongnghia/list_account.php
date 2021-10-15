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
        printf ("<tr><td>%s</td><td>%s</td></tr>", $myrow['username'], $myrow['password']);
    }
    pg_close($db);
    ?>
    </table>
    <BR><a href="index.php">HOME</a>
</body> 
</html>