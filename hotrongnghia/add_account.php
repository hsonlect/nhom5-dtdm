<!DOCTYPE html>
<html lang="en">
<body>
    <h2>PHP Form Validation Example</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        UserName: <input type="text" name="username" value=""><BR>
        PassWord: <input type="text" name="password" value=""><BR>
        <input type="submit" name="submit" value="Submit">
    </form>
    
    <?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if ( $username != "" && $password != "") {
        require_once "connect_db.php";
    
        $sql =<<<EOF
        INSERT INTO my_accounts (username, password) 
        VALUES ('$username', '$password');
        EOF;
        $ret = pg_query($db, $sql);
        if (!$ret) {
            echo pg_last_error($db);
        } else {
            echo "Insert seccessfully!\n";
        }
        pg_close($db);
    }    
    ?>
    <BR><a href="index.php">HOME</a>
</body>
</html>