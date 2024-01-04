<?php
require "components/SideBar.php";
require "components/AuthGurad.php";
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <style>
        *{
            font-family: roboto;
        }
        .faq-box {
            background-color: black;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            border: 2px solid white;
            border-radius: 20px;
        }

        h3 {
            color: white;
            font-size: 25px;
        }

        p {
            color: white;
            font-size: 25px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona Startowa</title>
</head>

<body>
    <?php
    echo SideBar("Start");
    ?>
     
  

    <div class="faq-box">
        <h3>📦 Pytanie 1: Jakie usługi oferuje Wasza firma kurierska?</h3>
        <p>Nasza firma kurierska świadczy kompleksowe usługi dostarczania przesyłek, w tym standardową dostawę, ekspresową oraz usługi logistyczne. Oferujemy także opcje śledzenia paczek online oraz dostawy międzynarodowe.</p>
    </div>

    <div class="faq-box">
        <h3>📦 Pytanie 2: Jak długo trwa dostawa standardowa, a jak szybka jest dostawa ekspresowa?</h3>
        <p>Czas dostawy zależy od lokalizacji oraz rodzaju usługi. Dostawa standardowa zazwyczaj zajmuje od 1 do 3 dni roboczych, podczas gdy dostawa ekspresowa umożliwia dostarczenie przesyłki już w ciągu 24 godzin od nadania.</p>
    </div>

    <div class="faq-box">
        <h3>📦 Pytanie 3: Jak mogę śledzić moją przesyłkę? &nbsp; &nbsp; Kliknij tutaj aby zobaczyć Twoje przesyłki -> <a href="/kasti-inc/dashboard-delivery.php">Przesyłki</a></h3>
        <p>Naszym klientom zapewniamy prosty system śledzenia online. Po nadaniu paczki otrzymasz unikalny numer śledzenia, który możesz wprowadzić na naszej stronie internetowej, aby monitorować aktualny status przesyłki.</p>
    </div>

    <div class="faq-box">
        <h3>📦 Pytanie 4: Czy oferujecie usługi dostaw międzynarodowych, i jakie kraje obejmuje Wasza oferta?</h3>
        <p>Tak, nasza firma kurierska świadczy usługi dostaw międzynarodowych. Oferujemy dostawy do wielu krajów na całym świecie. Listę obsługiwanych krajów można znaleźć na naszej stronie internetowej lub skonsultować się z naszym działem obsługi klienta.</p>
    </div>
    <br>
    <div class="box">

    </div>




    </div>
</body>

</html>