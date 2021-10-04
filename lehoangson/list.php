<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST ACCOUNTS</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include "header.php"; ?>

    <main>
        <table>
            <thead>
                <th>Username</th>
                <th>Password</th>
            </thead>
            <tbody>
                
                <?php
                function pg_connection_string_from_database_url()
                {
                    extract(parse_url($_ENV["DATABASE_URL"]));
                    return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
                }
                $db = pg_connect(pg_connection_string_from_database_url());
                $sql = "SELECT * FROM lehoangson;";
                $ret = pg_query($db, $sql);
                if (!$ret) {
                    echo pg_last_error($db);
                    exit();
                }
                pg_close($db);
                while ($myrow = pg_fetch_assoc($ret)) {
                    printf("<tr><td>%s</td><td>%s</td></tr>", $myrow['username'], $myrow['password']);
                }
                ?>

            </tbody>
        </table>
    </main>

    <?php include "footer.php"; ?>

</body>

</html>