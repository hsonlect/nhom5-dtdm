<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Nhập thong tin</title>
        <style>
                body{ padding: 0 30%;}
        </style>
<head>
<body>
        <h4>Nhap thong tin tai khoan can xoa</h4>
        <form action="delete_data.php" method="post">
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
                                <td><input type="submit" value="Xoa"></td>
                                <td><input type="reset" value="Hủy"></td>
                        </tr>
                </table>
        </form>
</body>
</html>
