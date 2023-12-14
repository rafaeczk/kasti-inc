<?php

define("SideBarItems", [
    [
        "label" => "Start",
        "url"   => "./dashboard-start.php"
    ],
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
            body {
                margin-left: 400px;
            }
            button#log-out-btn {
                display: block;
                outline: none;
                border: none;
                background-color: red;
                color: white;
                width: 100%;
                padding: 10px;
            }
            button#log-out-btn:hover {
                text-decoration: underline;
                cursor: pointer;
            }
        </style>
        <section id='sidebar'>
            <div class='logo'>
                KASTI INC
            </div>
            $items

            <form action='log-in.php' method='post'>
                <button type='submit' name='log-out' id='log-out-btn'>Wyloguj się</button>
            </form>
        </section>
    ";
}
