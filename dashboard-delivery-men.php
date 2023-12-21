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
        
        body {
            background-color: #f4f4f4;
            margin: 0;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            color: white;
        }

        * {
            box-sizing: border-box;
            text-transform: uppercase;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td a {
            color: #3498db;
            font-weight: bold;
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