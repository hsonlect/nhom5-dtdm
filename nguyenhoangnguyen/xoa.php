<?php
  $username=$_POST["username"];
  $password=$_POST["password"];
function pg_connection_string_from_database_url() {
extract(parse_url("postgres://mbspycvjqdzksv:f1e5253bdc82a019559721281157cfc743f5860c324aa2381690d105754c2463@ec2-44-198-196-149.compute-1.amazonaws.com:5432/dsr7457q5l6c4"));  
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require th>
}
   $db = pg_connect(pg_connection_string_from_database_url() );
   if(!$db){
      echo "<p style='color:gray;'>Error : Unable to open database</p>";
   } else {
      echo "<p style='color:blue;'>Opened database successfully</p>";
   }

   $sql ="DELETE FROM Account WHERE username='$username' and password='$password'";

   print "<BR>$sql<BR>";
   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "<h4 style='color:green;'>DELETE successfully</h4>";
   }
   pg_close($db);
   echo "<br><a href='index.php'>home</a>";
?>	  
