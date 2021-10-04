<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD ACCOUNTS</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include "header.php"; ?>

    <main>
        <div class="main-form">
            <form action="add.php" method="POST">
                <div class="title color-dodgerblue">
                    <p>Thông tin tài khoản</p>
                </div>
                <div class="form-item">
                    <!-- <label for="username">Username</label> -->
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-item">
                    <!-- <label for="password">Password</label> -->
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-item">
                    <input type="submit" value="Insert">
                </div>
            </form>
        </div>

        <div class="main-box">
            <?php
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                if (($username != "") && ($password != "")) {
                    $message = "Inserting <b>$username</b>...<br>";
                    echo '<div class="text-center color-red">' . $message . '</b></div>'; //In ra thong bao truoc khi insert.
                    require "connect_db.php";
                    $sql = "INSERT INTO lehoangson(USERNAME, PASSWORD) VALUES('$username', '$password');";
                    $ret = pg_query($db, $sql);
                    if (!$ret) {
                        $message = pg_last_error($db);
                    } else {
                        $message = "Inserted successfully.";
                    }
                    pg_close($db);
                } else {
                    $message = "Bạn chưa nhập đầy đủ thông tin.";
                }
            } else {
                $message = "Bạn chưa nhập thông tin.";
            }
            echo '<div class="color-red">' . $message . '</b></div>';
            ?>
        </div>
    </main>

    <?php include "footer.php"; ?>

</body>

</html>