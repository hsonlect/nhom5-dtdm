<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>TrươngMinhTâm_B1809177_Đăng Ký thành viên</title>
    <link rel="stylesheet" href="style_register.css">
    <!-- <script src="./javascript/signup.js"></script> -->
    
</head>
    <body>
            <center><h3 style="color:red" >Đăng ký tài khoản mới</h3></center>
            <center><p>Vui lòng điền đầy đủ thông tin bên dưới để đăng ký tài khoản mới</p></center>
            <div class="container">
                <form name="signup"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
                    <div class="row">
                        <div class="col-25">
                                <label for="username">Tên đăng nhập:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="username" name="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="password">Mật khẩu:</label>
                        </div>
                        <div class="col-75">
                            <input type="password" id="password" name="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="re_password">Gõ lại mật khẩu:</label>
                        </div>
                        <div class="col-75">
                            <input type="password" id="re_password" name="re_password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="gender">Giới tính:</label>
                        </div>
                        <div class="col-75">
                            <input type="radio" id="Male" name="gender" value="Nam">
                            <label for="Male">Nam</label>
                                <input type="radio" id="Female" name="gender" value="Nữ">
                            <label for="Female">Nữ</label>
                                <input type="radio" id="other" name="gender" value="Khác" checked>
                            <label for="other">Khác</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">    
                            <label for="job">Nghề nghiệp:</label>
                        </div>
                        <div class="col-75">
                            <select id="job" name="job">
                                <option value="Học sinh">Học sinh</option>
                                <option value="Sinh viên">Sinh viên</option>
                                <option value="Giảng viên">Giảng viên</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-25">
                                <label for="sodt">Số điện thoại:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="sodt" name="sodt">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25"></div>
                        <div class="col-75" >
                            <input type="submit"  name="submit" value="Submit" >
                            <input type="reset" name="reset" value="Reset">
                        </div>
                    </div>
                </form>
            </div>
		<?php
			$username 		= $_POST['username'];
			$password 		= $_POST['password'];
			$gioitinh		= $_POST['gender'];
			$nghenghiep		= $_POST['job'];
			$sodt 			= $_POST['sodt'];

			function pg_connection_string_from_database_url() {
				extract(parse_url($_ENV["DATABASE_URL"]));
				return "user=$user password=$pass host=$host dbname=" . substr($path, 1);
			}
			$db = pg_connect(pg_connection_string_from_database_url() );
			if(!$db){
				echo "Error : Unable to open database\n";
			}
			$sql = "INSERT INTO Thanhvien(username, password, gioitinh, nghenghiep, sodt)  
		        		VALUES ('$username','$password','$gioitinh', '$nghenghiep', '$sodt')";
			if($username == "" || $password =="") {
				echo "Vui long nhap thong tin!!!";
			}
			$ret = pg_query($db, $sql);
			if(!$ret){
				echo pg_last_error($db);
			}
			pg_close($db);
		?>
        <center><h3>Trương Minh Tâm - MSSV: B1809177</h3></center>  

    </body>
</html>
