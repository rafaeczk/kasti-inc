<?php
require 'components/Table.php';
require 'components/Filters.php';
require "components/SideBar.php";
require 'db/senders/getSenders.php';
require 'db/revicers/getRevicers.php';
require 'components/Tabs.php';
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/general.css">
    <title>Document</title>
</head>

<body>
    <?php
    echo SideBar("Nadawcy i odbiorcy");
    ?>

    <?php
    echo Tabs([
        ["label" => "Nadawcy", "value" => "senders"],
        ["label" => "Odbiorcy", "value" => "revicers"],
    ])
    ?>

    <?php
    echo Filters([
        ["type" => "text", "name" => "names", "label" => "Imię i nazwisko"],
        ["type" => "text", "name" => "email", "label" => "Email"],
        ["type" => "text", "name" => "phone", "label" => "Telefon"],
        ["type" => "text", "name" => "city", "label" => "Miasto"],
    ]);
    
    $data = [];
    switch($_GET['tab'])
    {
    case "senders":
        $data = getSenders(
            isset($_GET['names']) ? $_GET['names'] : null,
            isset($_GET['email']) ? $_GET['email'] : null,
            isset($_GET['phone']) ? $_GET['phone'] : null,
            isset($_GET['city']) ? $_GET['city'] : null,
        );
        break;
    case "revicers":
        $data = getRevicers(
            isset($_GET['names']) ? $_GET['names'] : null,
            isset($_GET['email']) ? $_GET['email'] : null,
            isset($_GET['phone']) ? $_GET['phone'] : null,
            isset($_GET['city']) ? $_GET['city'] : null,
        );
        break;
    }
    echo Table(['id', 'imię', 'nazwisko', 'email', 'telefon', 'ulica', 'nr domu', 'nr lokalu', 'kod', 'miasto'], $data);
    ?>
</body>

</html>