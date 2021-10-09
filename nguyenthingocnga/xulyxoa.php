<?php
$username=$_GET['username'];


function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1);
}
   $db = pg_connect(pg_connection_string_from_database_url() );
   if(!$db){
      echo "Lỗi: Kết nối cơ sở dữ liệu không thành công\n";
   } else {
	         echo "Kết nối cơ sở dữ liệu thành công\n";
   }
    $sql="DELETE FROM sanpham WHERE username='".$username."'";

   $ret = pg_query($db, $sql);
   if(!$ret){
        echo "Lỗi: thực hiện truy vấn không thành công\n";
        echo pg_last_error($db);
   }else{
        echo "Thực hiện truy vấn thành công\n";
   }
?>
