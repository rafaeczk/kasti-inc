<?php
require "components/SideBar.php";
require "components/AuthGurad.php";
require "db/delivery-men/getDeliveryMen.php";
require "db/delivery-men/addDeliveryMan.php";
require "db/company-branches/getCompanyBranchById.php";
require "db/company-branches/getCompanyBranchesSelectList.php";
require "components/Table.php";
require "components/Filters.php";
require "components/FormModal.php";
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/general.css">
    <title>Kurierzy</title>

</head>

<body>

    <?php echo SideBar("Kurierzy") ?>

    <div style="display: flex; gap: 100px">
        <?php
        $companyBranches = getCompanyBranchesSelectList();

        echo Filters([
            ["type" => "text", "name" => "first-name", "label" => "Imię"],
            ["type" => "text", "name" => "last-name", "label" => "Nazwisko"],
            ["type" => "select", "name" => "company-branch-id", "label" => "Oddział firmy", "selectItems" => $companyBranches],
        ]);
        ?>

        <?php
        $items = "<option value=''>-</option>";
        foreach ($companyBranches as $i)
            $items .= "<option value=".$i['code'].">".$i['label']."</option>";
        
        echo OpenModalButton("addModal", "➕Dodaj");
        echo FormModal("addModal", "#", "POST", "➕Dodaj","
            <input type=text name=f-name placeholder=Imię />
            <input type=text name=f-name placeholder=Nazwisko />
            <input type=text name=phone-number placeholder=Telefon />
            <input type=number name=hour-from placeholder='Godziny od' />
            <input type=number name=hour-to placeholder='Godziny do' />
            <select name=company-branch-id>$items</select>
        ");

        if(isset($_POST['f-name']))
        {
            $ok = addDeliveryMan(
                $_POST['f-name'],
                $_POST['l-name'],
                $_POST['phone-number'],
                $_POST['hour-from'],
                $_POST['hour-to'],
                $_POST['company-branch-id']
            );
            if($ok)
                header("Location: #");
        }
        ?>
    </div>

    <?php
    $deliveryMen = getDeliveryMen(
        isset($_GET['first-name']) ? $_GET['first-name'] : null,
        isset($_GET['last-name']) ? $_GET['last-name'] : null,
        isset($_GET['company-branch-id']) ? (int)$_GET['company-branch-id'] : null,
    );
    for ($i = 0; $i < count($deliveryMen); $i++) {
        $companyBranch = getCompanyBranchById($deliveryMen[$i]['id_oddzialu']);
        unset($deliveryMen[$i]['id_oddzialu']);
        $deliveryMen[$i]['oddzial'] = "<a href='dashboard-company-branches.php?id_oddzialu=" . $companyBranch['id_oddzialu'] . "'>" . $companyBranch['nazwa_oddzialu'] . "</a>";
    }
    echo Table(["id", 'imie', 'nazwisko', 'tel', 'godziny od', 'godziny do', 'oddzial'], $deliveryMen);
    ?>

</body>

</html>