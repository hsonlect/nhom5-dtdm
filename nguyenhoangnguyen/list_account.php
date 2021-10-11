<!DOCTYPE>
<html>
<head>
<style>
.error {color : #FF0000;}
</style>
</head>
<body>
<?php
function pg_connection_string_from_database_url() {
  extract(parse_url("postgres://mbspycvjqdzksv:f1e5253bdc82a019559721281157cfc743f5860c324aa2381690d105754c2463@ec2-44-198-196-149.compute-1.amazonaws.com:5432/dsr7457q5l6c4"));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}
   $db = pg_connect(pg_connection_string_from_database_url() );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }

   $sql ="Select * from Myaccount";
   print "<br>$sql<br>";

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
    exit();
   }
?>
<br>
        <table border="1" cellspacing="2" cellpadding="2">
        <tr><td>Username</td><td>Password</td></tr>
<?php
        while($myrow = pg_fetch_assoc($ret)) {
                printf ("<tr><td>%s</td><td>%s</td></tr>" , $myrow['username'],$myrow['password']);
        }
        pg_close($db);
        ?>
        </table>
        <br><a href="index.php">home</a>
</body>
</html>
