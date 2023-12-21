<?php
require "components/SideBar.php";
require "components/AuthGurad.php";
require "db/delivery-men/getDeliveryMen.php";
require "components/Table.php";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/general.css">
    <title>Document</title>
    <style>
        *{
            color:  white;
            text-transform: uppercase;
            font-size: 40px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        </style>
</head>
<body>

<?php echo SideBar("Kurierzy") ?>

<?php
    $deliveryMen = getDeliveryMen();
    echo Table(["id", 'imie', 'nazwisko', 'tel', 'godziny od', 'godziny do', 'idoddzialu'], $deliveryMen);
?>

</body>
</html>