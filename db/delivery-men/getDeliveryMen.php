<?php

require_once "db/connectDB.php";

function getDeliveryMen(
    ?string $firstName = "%",
    ?string $lastName = "%",
    ?int $companyBranchId
    )
{
    $firstName = "%$firstName%";
    $lastName = "%$lastName%";

    $sql = "select * from kurier where imie_kr like ? and nazwisko_kr like ?" . ($companyBranchId ? " and id_oddzialu = ?" : '');

    $stmt = DB->prepare($sql);
    if($companyBranchId)
        $stmt->bind_param("ssi", $firstName, $lastName, $companyBranchId);
    else
        $stmt->bind_param("ss", $firstName, $lastName);
    $stmt->execute();

    $data = [];
    $res = $stmt->get_result();
    while($row = $res->fetch_assoc())
        array_push($data, $row);

    return $data;
}