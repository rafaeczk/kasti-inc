<link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<?php

define("SideBarItems", [
    [
        "label" => "Start",
        "icon" => "fa-solid fa-house",
        "url"   => "./dashboard-start.php"
    ],
    [
        "label" => "Kurierzy",
        "icon" => "fa-solid fa-person-digging",
        "url"   => "./dashboard-delivery-men.php"
    ],
    [
        "label" => "Nadawcy",
        "icon" => "fa-solid fa-person-digging",
        "url"   => "./dashboard-senders.php"
    ],
    [
        "label" => "Przesyłki",
        "url"   => "./dashboard-delivery.php"
    ], 
    [
        "label" => "Oddziały",
        "url"   => "./dashboard-company-branches.php",
    ],
    [
        "label" => "Klienci Serwisu",
        "icon" => "fa-solid fa-users",
        "url"   => "./dashboard-clients.php"
    ], 
    [
        "label" => "Kartoteka Sprzętu",
        "icon" => "",
        "url"   => "./kartoteka.php"
    ],
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
        *{
        background-color:black;
        }
            #sidebar {
                position: fixed;
                left: 0;
                top: 0;
                bottom: 0;
                width: 300px;
                background-color: #000;
                color: #fff;
                display: flex;
                flex-direction: column;
                gap: 10px;
                padding: 50px 0;
                border: 10px solid;
                border-image: linear-gradient(45deg, gold, deeppink) 1;
                clip-path: inset(0px round 10px);
                animation: huerotate 6s infinite linear;
                filter: hue-rotate(360deg);
            }
            #sidebar > .sidebar-item {
                color: #fff;
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
                background-color: #d9534f;
                color: #fff;
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
?>
