<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nhập thong tin</title>
	<style>
		body{ padding: 0 30%;
		}
	</style>
<head>
<body>
	<h4>Mời nhập thông tin</h4>
	<form action="insert_data.php" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Gửi"></td>
				<td><input type="reset" value="Hủy"></td>
			</tr>
		</table>
	</form>
</body>
</html>
