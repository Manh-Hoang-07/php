<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
    <title>AdminCP</title>
</head>
<body>
    <h3 class="title-admin">AdminCP</h3>
    <div class="wrapper">
        <?php
        include "config/config.php";
        include "modules/header.php";
        include "modules/menu.php";
        include "modules/main.php";
        include "modules/footer.php";
        ?>
    </div>
</body>
</html>