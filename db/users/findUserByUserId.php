<?php

require_once "db/connectDB.php";

function findUserByUserId(int $userId)
{
    $stmt = DB->prepare("select * from konto where id_konta = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    
    $res = $stmt->get_result();
    while($el = $res->fetch_assoc())
        return $el;
    
    return false;
}
