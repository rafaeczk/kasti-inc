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
       
.table-container {
    overflow-x: scroll;
    white-space: nowrap;
}
.table-container table.table {
    border-collapse: collapse;
    color: white,
}
.table-container table.table thead th {
    padding: 5px 20px;
    text-align: left;
    font-size: 15px;
    color: rgb(160, 160, 160);
}
.table-container table.table tbody td {
    padding: 5px 20px;
    font-size: 25px;
    border-top: 1px solid gray;
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