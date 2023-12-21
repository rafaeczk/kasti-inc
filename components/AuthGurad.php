<?php

session_start();

if(!isset($_SESSION['userId'])){
   echo"<style></style>";
    echo "nie jestes zalogowany <a href=log-in.php>zaloguj sie</a>";
    exit();
}