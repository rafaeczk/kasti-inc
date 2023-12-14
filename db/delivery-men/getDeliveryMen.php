<?php

require_once "db/connectDB.php";

function getDeliveryMen(
    ?string $firstName = "%",
    ?string $lastName = "%"
    )
{
    $firstName = "%$firstName%";
    $lastName = "%$lastName%";

    $stmt = DB->prepare("select * from kurier where imie_kr like ? and nazwisko_kr like ?");
    $stmt->bind_param("ss", $firstName, $lastName);
    $stmt->execute();

    $data = [];
    $res = $stmt->get_result();
    while($row = $res->fetch_assoc())
        array_push($data, $row);

    return $data;
}