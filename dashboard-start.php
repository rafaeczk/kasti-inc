<?php
require "components/SideBar.php";
require "components/AuthGurad.php";
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <style>
      

        * {
            color: white;
            text-transform: uppercase;
            font-size: 40px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .glowne {
         
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo SideBar("Start");
    ?>

    <div class="glowne">
       sss
    </div>
</body>

</html>