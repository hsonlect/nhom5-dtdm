<?php
   require_once "connect_db.php";
   
   $sql =<<<EOF
      CREATE TABLE my_accounts
      (USERNAME VARCHAR(16) PRIMARY KEY NOT NULL,
      PASSWORD VARCHAR(16) NOT NULL);
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   }
   pg_close($db);
?>
