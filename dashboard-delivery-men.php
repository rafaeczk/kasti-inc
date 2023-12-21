<?php
require "components/SideBar.php";
require "components/AuthGurad.php";
require "db/delivery-men/getDeliveryMen.php";
require "db/company-branches/getCompanyBranchById.php";
require "db/company-branches/getCompanyBranchesSelectList.php";
require "components/Table.php";
require "components/Filters.php";
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
    echo Filters([
        [ "type" => "text", "name" => "first-name", "label" => "Imię" ],
        [ "type" => "text", "name" => "last-name", "label" => "Nazwisko" ],
        [ "type" => "select", "name" => "company-branch-id", "label" => "Oddział firmy", "selectItems" => getCompanyBranchesSelectList() ],
    ]);
?>

<?php
    $deliveryMen = getDeliveryMen(
        isset($_GET['first-name']) ? $_GET['first-name'] : null,
        isset($_GET['last-name']) ? $_GET['last-name'] : null,
        isset($_GET['company-branch-id']) ? (int)$_GET['company-branch-id'] : null,
    );
    for($i = 0; $i < count($deliveryMen); $i++)
    {
        $companyBranch = getCompanyBranchById($deliveryMen[$i]['id_oddzialu']);
        unset($deliveryMen[$i]['id_oddzialu']);
        $deliveryMen[$i]['oddzial'] = "<a href='dashboard-company-branches.php?id_oddzialu=".$companyBranch['id_oddzialu']."'>".$companyBranch['nazwa_oddzialu']."</a>";
    }
    echo Table(["id", 'imie', 'nazwisko', 'tel', 'godziny od', 'godziny do', 'oddzial'], $deliveryMen);
?>

</body>
</html>