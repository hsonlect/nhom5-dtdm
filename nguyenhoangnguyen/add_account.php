<!DOCTYPE>
<html>
<head>
<style>
#tit {
          color : red;
      text-align:center;}
#fm {
        height : 150px;
        width : 27%;
        background-color : #DCDCDC;
        margin-left:35%;
        border : 0.6px solid black;
        padding : 22px;

}
#dong1 {
        margin-left:60px;
}
#dong2 {
        margin-left:63px;
}
#dong7 {
        margin-left:160px;
}
</style>
</head>
<body>
<div id="tit">
 <h2> Đăng ký tài khoản mới </h2>
</div>
<div id="fm">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
Username : <input type="text" id="dong1" name="username" value="<?php echo $username; ?>"><br><br>
Password : <input type="text" id="dong2" name="password" value="<?php echo $password; ?>"><br><br>
<input type="submit" id="dong7" name="submit" value="Add">
</form>
</div>
<?php
  $username=$_POST["username"];
  $password=$_POST["password"];
function pg_connection_string_from_database_url() {
 extract(parse_url("postgres://mbspycvjqdzksv:f1e5253bdc82a019559721281157cfc743f5860c324aa2381690d105754c2463@ec2-44-198-196-149.compute-1.amazonaws.com:5432/dsr7457q5l6c4"));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require th>
}
   $db = pg_connect(pg_connection_string_from_database_url() );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
 }

   $sql ="INSERT INTO Myaccount (username,password) VALUES ('$username','$password')";

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Insert successfully\n";
   }
   pg_close($db);

?>
</body>
</html>
