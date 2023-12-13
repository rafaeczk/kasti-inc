<?php
session_start();
require("components/SideBar.php");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

if(!isset($_SESSION['userId'])){
    echo "nie jestes zalogowany <a href=log-in.php>zaloguj sie</a>";
    exit();
}
?>

<?php echo SideBar("") ?>
</body>
</html>