<!DOCTYPE HTML>
 <html>
     <head>
          <style>
           .error {color: #FF0000;}
           </style>
     </head>
     <body>
        <h2>them du lieu</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            User Name: <input type="text" name="username" value="<?php echo $username ; ?>"><BR>
            Password: <input type="text" name="password" value="<?php echo $password; ?>"><BR>
            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
        $username=$_POST["username"];
        $password=$_POST["password"];
        function pg_connection_string_from_database_url() {
            extract(parse_url($_ENV[ "DATABASE_URL"]));
            return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # < you may want to add sslmode=require there t>        }
            $db = pg_connect(pg_connection_string_from_database_url());
            if(!$db) {
                echo "Error : Unable to open database\n"; }
            else {
                echo "<br>Opened database successfully\n";
            }
            $sql="INSERT INTO nhu_table (username, password) VALUES ('$username', '$password')";
           
            $ret = pg_query($db, $sql);
            if(!$ret){
                echo pg_last_error($db); }
            else {
                echo "<br>Insert successfully\n";
            }
                pg_close($db);
        ?>
        </body>
        </html>
