<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
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
   
   $sql ="SELECT * FROM phuong_table";

   print "<BR>$sql<BR>";
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
   while ($myrow = pg_fetch_assoc($ret)){
	printf ("<tr><td>%s</td><td>%s</td></tr>",$myrow['username'], $myrow['password']);
  }
 pg_close($db);
?>
   </table>
   <BR><a href="index.html">Trolai</a>
</body></html>
