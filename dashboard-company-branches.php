<?php
require "components/SideBar.php";
require "components/AuthGurad.php";
require "components/Table.php";
require "components/Filters.php";
require "db/company-branches/getCompanyBranches.php";
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

<?php echo SideBar("Oddziały") ?>

<?php
    echo Filters([
        [ "type" => "text", "name" => "name", "label" => "Nazwa" ],
        [ "type" => "text", "name" => "city", "label" => "Miasto" ],
        [ "type" => "text", "name" => "phone", "label" => "Telefon" ],
        [ "type" => "text", "name" => "email", "label" => "Email" ],
    ]);
?>

<?php
    $companyBranches = getCompanyBranches(
        isset($_GET['name']) ? $_GET['name'] : null,
        isset($_GET['city']) ? $_GET['city'] : null,
        isset($_GET['phone']) ? $_GET['phone'] : null,
        isset($_GET['email']) ? $_GET['email'] : null,
    );
    echo Table(['id', 'nazwa', 'ulica', 'nr domu', 'nr lokalu', 'kod', 'miasto', 'telefon', 'email'], $companyBranches);
?>

</body>
</html>