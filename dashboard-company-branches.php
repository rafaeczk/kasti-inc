<?php
require "components/SideBar.php";
require "components/AuthGurad.php";
require "components/Table.php";
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
    $companyBranches = getCompanyBranches();
    echo Table(['id', 'nazwa', 'ulica', 'nr domu', 'nr lokalu', 'kod', 'miasto', 'telefon', 'email'], $companyBranches);
?>

</body>
</html>