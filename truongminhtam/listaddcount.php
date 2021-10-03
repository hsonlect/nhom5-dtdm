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
				return "user=$user password=$pass host=$host dbname=" . substr($path, 1);
			}
			$db = pg_connect(pg_connection_string_from_database_url() );
			if(!$db){
				echo "Error : Unable to open database\n";
			}
			$sql = "SELECT * FROM Thanhvien";
			$ret = pg_query($db, $sql);
			if(!$ret){
				echo pg_last_error($db);
			}
				echo "	<div id ='container'>	";
					echo "<p>Danh sách các thành viên: </p>";
					echo "<table border=1>";

						echo "<tr>
								  <th>STT</th>
								  <th>Tên tài khoản</th>
								  <th>Giới tính</th>
								  <th>Nghề nghiệp</th>
								  <th>Số ĐT</th>
								  <th>Lựa chọn</th>
							  </tr>";
					$i =1;
					while($row  =  pg_fetch_assoc($ret))
					{
						echo "	<tr><td> 		 	$i 				</td>";
						echo "		<td> 		 ".$row['username']."	</td>";
						echo "		<td> 		 ".$row['password']."	</td>";
						echo "		<td> 		 ".$row['gioitinh']."	</td>";
						echo "		<td> 		 ".$row['nghenghiep']."	</td>";
						echo "		<td> 		 ".$row['sodt']."	</td>";
						echo "		<td><a href='./deleteaccount.php?idtv=". $row['id'] ."'>Delete</a></td></tr>";
						$i++;
					
					}
					echo "</table>";
				echo "</div>";
				echo "<div class='logout'>
					 <button type='button'><a href='logout.php'>Đăng Xuất</a></button>
				</div>";	
			pg_close($db);
		 ?>
	</body>
	</html>
