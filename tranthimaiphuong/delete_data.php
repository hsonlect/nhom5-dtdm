<?php
  $username=$_POST["username"];
  $password=$_POST["password"];
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}
   $db = pg_connect(pg_connection_string_from_database_url() );
   if(!$db){
      echo "<p style='color:red;'>Error : Unable to open database</p>";
   } else {
      echo "<p style='color:green;'>Opened database successfully</p>";
   }
   
   $sql ="DELETE FROM phuong_table WHERE username='$username' and password='$password'";

   print "<BR>$sql<BR>";
   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "<h4 style='color:green;'>DELETE successfully</h4>";
   }
   pg_close($db);
   echo "<br><a href=index.html>Tro lai</a>";
?>
