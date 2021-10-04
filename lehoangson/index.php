<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include "header.php" ;?>

    <main>
        <ul class="nav text-center">
            <li><a href="connect_db.php">Script check connect Postgesql</a></li>
            <li><a href="setup.php">Script create table lehoangson</a></li>
            <li><a href="list.php">Form list all accounts</a></li>
            <li><a href="add.php">Form insert new accounts</a></li>
            <li><a href="delete.php">Form delete an accounts</a></li>

        </ul>
    </main>

    <?php include "footer.php";?>

</body>

</html>