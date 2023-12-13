<?php

require_once "db/connectDB.php";

function addUser(string $login, string $hash, ?string $status)
{
    $stmt = DB->prepare("insert into konto values (null, ?, ?, ?, ?)");
    $todayDate = gmdate("Y-m-d");
    $status = $status ?? "ACTIVE";
    $stmt->bind_param("ssss", $login, $hash, $todayDate, $status);
    $stmt->execute();

    return $stmt->affected_rows == 1;
}