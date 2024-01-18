<?php

require_once "db/connectDB.php";

function addDeliveryMan(
    string $fName,
    string $lName,
    string $phone,
    int $hourFrom,
    int $hourTo,
    int $companyBranchId
)
{
    $stmt = DB->prepare("INSERT INTO kurier VALUES (NULL, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_params("sssiii", $fName, $lName, $phone, $hourFrom, $hourTo, $companyBranchId);
    $stmt->execute();

    return $stmt->affected_rows == 1;
}