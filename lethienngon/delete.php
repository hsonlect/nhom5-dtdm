<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Xóa một dòng dữ liệu</title>
</head>

<body>
    <h1>Delete</h1>
    <h3>Nhập vào mssv của bạn</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <table border="0">
            <tr>
                <td>
                    <label for="mssv">MSSV</label>
                </td>
                <td>
                    <input type="text" name="mssv" id="mssv">
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php
$mssv= $_POST["mssv"];
function pg_connection_string_from_database_url()
{
    extract(parse_url($_ENV["DATABASE_URL"]));
    return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}
$db = pg_connect(pg_connection_string_from_database_url());
if ($mssv == "") {
    exit();
}
if (!$db) {
    echo "Error : Unable to open database\n";
} else {
    echo "Opened database successfully\n";
}
$sql = "DELETE FROM tofulee WHERE mssv='$mssv'";
print "<BR>$sql<BR>";
$ret = pg_query($db, $sql);
if (!$ret) {
    echo pg_last_error($db);
} else {
    echo "Delete successfully\n";
}
pg_close($db);
?>