<?php

require_once "db/connectDB.php";

function getCompanyBranches(
    ?string $name = "%",
    )
{
    $name = "%$name%";

    $stmt = DB->prepare("select * from oddzial_firmy where nazwa_oddzialu like ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $data = [];
    $res = $stmt->get_result();
    while($row = $res->fetch_assoc())
        array_push($data, $row);

    return $data;
}