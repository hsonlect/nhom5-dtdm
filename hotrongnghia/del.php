<?php
    $username = $_GET["username"];
    echo $username;

    require_once "connect_db.php";

    $sql =<<<EOF
     DELETE FROM my_accounts WHERE username = '$username';
    EOF;
    $ret = pg_query($db, $sql);
    if (!$ret) {
        echo pg_last_error($db);
        exit();
    }
    header('location: del_account.php');
    ?>
?>