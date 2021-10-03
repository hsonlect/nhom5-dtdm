<?php
	function pg_connection_string_from_database_url() {
		extract(parse_url($_ENV["DATABASE_URL"]));
		return "user=$user password=$pass host=$host dbname=". substr($path,1);
	}
	$db = pg_connect(pg_connection_string_from_database_url());
	
	if(!$db) {
		echo "Error: Khong the ket noi voi database";
	} else {
		echo "Ket noi database thanh cong!";
	}
	
	$sql = "CREATE TABLE Thanhvien (
			id SERIAL,
			username CHAR(16),
			password CHAR(32),
			gioitinh VARCHAR(5),
			nghenghiep VARCHAR(30),
			sodt CHAR(11)
	)";
	
	$result = pg_query($db,$sql);
	if(!$result) {
		echo pg_last_error($db);
	} else {
		echo "Tao bang thanh cong";
	}
	pg_close($db);
 ?>
