<?php

require_once "db/connectDB.php";

function getCompanyBranches(
    ?string $name = "%",
    ?string $city = "%",
    ?string $phone = "%",
    ?string $email = "%",
    )
{
    $name = "%$name%";
    $city = "%$city%";
    $phone = "%$phone%";
    $email = "%$email%";

    $stmt = DB->prepare("select * from oddzial_firmy where nazwa_oddzialu like ? and miasto_oddzialu like ? and tel_oddzialu like ? and email_oddzialu like ?");
    $stmt->bind_param("ssss", $name, $city, $phone, $email);
    $stmt->execute();

    $data = [];
    $res = $stmt->get_result();
    while($row = $res->fetch_assoc())
        array_push($data, $row);

    return $data;
}