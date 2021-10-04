<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Liệt kê danh sách các dữ liệu</title>
</head>

<body>
  <h1>List</h1>
  <?php
  function pg_connection_string_from_database_url()
  {
    extract(parse_url($_ENV["DATABASE_URL"]));
    return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
  }
  $db = pg_connect(pg_connection_string_from_database_url());
  if (!$db) {
    echo "Error : Unable to open database\n";
  } else {
    echo "Opened database successfully\n";
  }
  $sql = "SELECT * FROM tofulee";
  print "<BR>$sql<BR>";
  $ret = pg_query($db, $sql);
  if (!$ret) {
    echo pg_last_error($db);
    exit();
  }
  pg_close($db);
  ?>
  <table border="1" cellspacing="2" cellpadding="2">
    <tr>
      <td>MSSV</td>
      <td>Name</td>
    </tr>
    <?php
    while ($myrow = pg_fetch_assoc($ret)) {
      printf("<tr><td>%s</td><td>%s</td></tr>", $myrow['mssv'], $myrow['name']);
    }
    pg_close($db);
    ?>
  </table>
</body>

</html>