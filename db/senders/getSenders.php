<?php

require_once "db/connectDB.php";

function getSenders(
    ?string $names = "%",
    ?string $email = "%",
    ?string $phone = "%",
    ?string $city = "%",
) {
    $names = "%$names%";
    $email = "%$email%";
    $phone = "%$phone%";
    $city = "%$city%";

    $stmt = DB->prepare("select * from nadawca where concat(imie_n, ' ', nazwisko_n) like ? and email_n like ? and telefon_n like ? and miasto_n like ?");
    $stmt->bind_param("ssss", $names, $email, $phone, $city);
    $stmt->execute();

    $data = [];
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc())
        array_push($data, $row);

    return $data;
}
