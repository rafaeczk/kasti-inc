<?php

require_once "db/connectDB.php";

function getCompanyBranchById(int $branchId)
{
    $stmt = DB->prepare("select * from oddzial_firmy where id_oddzialu = ?");
    $stmt->bind_param("i", $branchId);
    $stmt->execute();
    
    $res = $stmt->get_result();
    while($el = $res->fetch_assoc())
        return $el;
    
    return false;
}