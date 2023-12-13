<?php

define("SideBarItems", [
    [
        "label" => "Kurierzy",
        "url"   => "dashboard-delivery-men"
    ], [
        "label" => "Klienci Serwisu",
        "url"   => "klienci"
    ], [
        "label" => "Kartoteka Sprzętu",
        "url"   => "kartoteka"
    ]
]);

function SideBar(string $currentItem)
{
    $items = "";
    foreach(SideBarItems as $i)
        $items .= "
            <a class='sidebar-item ".($i['url'] == $currentItem ? "current" : "")."' href='".$i['url']."'>
                ".$i['label']."
            </a>
        ";

    return "
        <section class='sidebar-container'>
            $items
        </section>
    ";
}
