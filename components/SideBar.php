<?php

define("SideBarItems", [
    [
        "label" => "Kurierzy",
        "url"   => "./dashboard-delivery-men.php"
    ], [
        "label" => "Klienci Serwisu",
        "url"   => "./klienci.php"
    ], [
        "label" => "Kartoteka Sprzętu",
        "url"   => "./kartoteka.php"
    ]
]);

function SideBar(string $currentItem)
{
    $items = "";
    foreach(SideBarItems as $i)
        $items .= "
            <a class='sidebar-item ".($i['label'] == $currentItem ? "current" : "")."' href='".$i['url']."'>
                ".$i['label']."
            </a>
        ";

    return "
        <style>
            #sidebar {
                position: fixed;
                left: 0;
                top: 0;
                bottom: 0;
                width: 300px;
                background-color: gray;
                color: white;
                display: flex;
                flex-direction: column;
                gap: 10px;
                padding: 50px 0;
            }
            #sidebar > .sidebar-item {
                color: white;
                background-color: rgb(255, 255, 255, .2);
                font-size: 20px;
                padding: 10px;
                text-decoration: none;
                border-left: 8px solid transparent;
            }
            #sidebar > .sidebar-item.current {
                border-color: white;
            }
            #sidebar > .sidebar-item:hover {
                text-decoration: underline;
            }
            #sidebar > .logo {
                font-size: 30px;
                border-bottom: 3px solid white;
                margin: 0 30px;
                text-align: center;
            }
            body{
                margin-left: 400px;
            }
        </style>
        <section id='sidebar'>
            <div class='logo'>
                KASTI INC
            </div>
            $items
        </section>
    ";
}
