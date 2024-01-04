<?php
require "components/SideBar.php";
require "components/AuthGurad.php";
require "components/Table.php";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klienci</title>
</head>
<body>
    <?php
        echo SideBar("Przesyłki");
    ?>
</body>
</html>