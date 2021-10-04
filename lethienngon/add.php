<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thêm một dòng dữ liệu </title>
</head>

<body>
    <h1>Add</h1>
    <h3>Mời bạn nhập MSSV và Name của bạn</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <table border="0">
            <tr>
                <td>
                    <label for="mssv">MSSV</label>
                </td>
                <td>
                    <input type="text" name="mssv" id="umssv">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">Name</label>
                </td>
                <td>
                    <input type="text" name="name" id="name">
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
$mssv = $_POST["mssv"];
$name = $_POST["name"];
function pg_connection_string_from_database_url()
{
    extract(parse_url($_ENV["DATABASE_URL"]));
    return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}
$db = pg_connect(pg_connection_string_from_database_url());
if ($mssv == "" && $name == "") {
    exit();
}
if (!$db) {
    echo "Error : Unable to open database\n";
} else {
    echo "Opened database successfully\n";
}
$sql = "INSERT INTO tofulee (mssv , name) VALUES ('$mssv' , '$name') ";
print "<BR>$sql<BR>";
$ret = pg_query($db, $sql);
if (!$ret) {
    echo pg_last_error($db);
} else {
    echo "Add successfully\n";
}
pg_close($db);
?>