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

   $sql="CREATE TABLE Myaccount (username CHAR(15) PRIMARY KEY NOT NULL ,password CHAR(50) )";
   print "$sql";

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   }
   pg_close($db);

?>
