<?php

require_once "db/connectDB.php";

function findUserByLogin(string $login)
{
    $stmt = DB->prepare("select * from konto where login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    
    $res = $stmt->get_result();
    while($el = $res->fetch_assoc())
        return $el;
    
    return false;
}
