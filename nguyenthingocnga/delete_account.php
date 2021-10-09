<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
table, td, th {
  border: 1px solid black;
}

table {
  width: 50%;
  background-color:#ffedba;
  border-collapse: collapse;
}
</style>
</head>
<body>
<?php
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
    $sql ="SELECT * from myaccounts";

   $ret = pg_query($db, $sql);
   if(!$ret){
        echo "Lỗi: thực hiện truy vấn không thành công\n";
        echo pg_last_error($db);
   }else{
        echo "Thực hiện truy vấn thành công\n";
   }
?>
<h2>Tài khoản:</h2>
<table>
  <tr>
    <th>USERNAME</th>
    <th>PASSWORD</th>
	<th>DELETE</th>
  </tr>
  <?php
  while($myRow = pg_fetch_assoc($ret)){
        printf("<tr><td>%s</td><td>%s</td>", $myRow['username'],$myRow['password']);
		echo"<td><a href='xulyxoa.php?username=".$myRow['username']."'><i class='fa fa-trash' aria-hidden='true'></i></td>";
		echo"</tr>";
  }   
  
  
  
  pg_close($db);
  ?>
</table>
<br><a href="index.php">HOME</a><br>
</body>
</html>
