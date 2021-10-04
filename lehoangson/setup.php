<?php

    require "connect_db.php";

    $sql = "CREATE TABLE lehoangson(
        USERNAME CHAR(10) PRIMARY KEY NOT NULL,
        PASSWORD CHAR(255) NOT NULL
    );";


   print "$sql<br>";
   $ret = pg_query($db, $sql);
   
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   }
   pg_close($db);
