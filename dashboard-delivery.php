<?php
require "components/SideBar.php";
require "components/AuthGurad.php";
require "components/Table.php";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/general.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przesyłki cioto</title>
</head>
<body>
    <?php
echo SideBar("Przesyłki");
?>




<div style="display: flex; gap: 100px">
    <?php
    $companyBranches = getCompanyBranchesSelectList();

    echo Filters([
        ["type" => "text", "name" => "first-name", "label" => "Imię"],
        ["type" => "text", "name" => "last-name", "label" => "Nazwisko"],
        ["type" => "select", "name" => "company-branch-id", "label" => "Oddział firmy", "selectItems" => $companyBranches],
    ]);
    ?>

    
    <form action="add_package.php" method="post">
        <label for="tracking_number">Numer przesyłki:</label>
        <input type="text" id="tracking_number" name="tracking_number"><br><br>
        <label for="recipient_name">Imię i nazwisko odbiorcy:</label>
        <input type="text" id="recipient_name" name="recipient_name"><br><br>
        <label for="recipient_address">Adres odbiorcy:</label>
        <input type="text" id="recipient_address" name="recipient_address"><br><br>
        <label for="sender_name">Imię i nazwisko nadawcy:</label>
        <input type="text" id="sender_name" name="sender_name"><br><br>
        <label for="sender_address">Adres nadawcy:</label>
        <input type="text" id="sender_address" name="sender_address"><br><br>
        <input type="submit" value="Dodaj przesyłkę">
    </form>
</body>
</html>
