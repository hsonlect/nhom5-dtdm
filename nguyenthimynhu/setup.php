<?php
    function pg_connection_string_from_database_url(){
        extract(parse_url($_ENV["DATABASE_URL"]));
        return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may to add sslmode=require there too
    }
    $db=pg_connect(pg_connection_string_from_database_url());
    if(!$db){
        echo "Error : Unable to open database\n";
    }
    else{
        echo "<br>Opened database sucessfully<br>";
    }
    $sql="CREATE TABLE nhu_table (username CHAR(10) PRIMARY KEY  NOT NULL, password    CHAR(50)   )";
    
    $ret =pg_query($db, $sql);
    if(!$ret){
        echo pg_last_error($db);
    }
    else{
        echo"<br>Table created sucessfully\n";
    }
    pg_close($db);
?>

