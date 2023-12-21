<?php

require_once "db/connectDB.php";

function getCompanyBranchesSelectList()
{
    
    $data = [];
    $res = DB->query("select oddzial_firmy.nazwa_oddzialu as label, oddzial_firmy.id_oddzialu as code from oddzial_firmy");
    while($row = $res->fetch_assoc())
        array_push($data, $row);

    return $data;
}