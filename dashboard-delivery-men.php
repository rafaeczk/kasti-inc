<?php
require "components/SideBar.php";
require "components/AuthGurad.php";
require "db/delivery-men/getDeliveryMen.php";
require "db/company-branch/getCompanyBranchById.php";
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
    for($i = 0; $i < count($deliveryMen); $i++)
    {
        $companyBranch = getCompanyBranchById($deliveryMen[$i]['id_oddzialu']);
        unset($deliveryMen[$i]['id_oddzialu']);
        $deliveryMen[$i]['oddzial'] = "<a href='dashboard-company-branches?id_oddzialu=".$companyBranch['id_oddzialu']."'>".$companyBranch['nazwa_oddzialu']."</a>";
    }
    echo Table(["id", 'imie', 'nazwisko', 'tel', 'godziny od', 'godziny do', 'oddzial'], $deliveryMen);
?>

</body>
</html>