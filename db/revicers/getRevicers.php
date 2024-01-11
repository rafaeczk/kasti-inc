<?php

require_once "db/connectDB.php";

function getRevicers(
    ?string $names = "%",
    ?string $email = "%",
    ?string $phone = "%",
    ?string $city = "%",
) {
    $names = "%$names%";
    $email = "%$email%";
    $phone = "%$phone%";
    $city = "%$city%";

    $stmt = DB->prepare("select * from odbiorca where concat(imie_o, ' ', nazwisko_o) like ? and email_o like ? and telefon_o like ? and miasto_o like ?");
    $stmt->bind_param("ssss", $names, $email, $phone, $city);
    $stmt->execute();

    $data = [];
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc())
        array_push($data, $row);

    return $data;
}
