<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trang Danh Sách Sản Phẩm</title>
	<link rel="stylesheet" href="style_list.css">
</head>
<body>
	<?php
		function pg_connection_string_from_database_url() {
		extract(parse_url($_ENV["DATABASE_URL"]));
		return "user=$user password=$passs host=$host dbname=". substr($path,1);
		}
		$db = pg_connect(pg_connection_string_from_database_url());
		
		if(!$db) {
			echo "Error: Khong the ket noi voi database";
		} else {
			

			if(($_GET['idtv'])) {
				$idtv = $_GET['idtv'];
				$sql ="DELETE FROM Thanhvien WHERE id = '$idtv'";
				$ret = pg_query($db, $sql);
			}
					
					$conn->close();
					header('location: listaccount.php');
		}

		
	?>

</body>
</html>
