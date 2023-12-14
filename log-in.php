<?php
require("db/users/findUserByLogin.php");
require("db/users/findUserByUserId.php");
require_once("db/connectDB.php");
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>

 *{
    color: red;
 }
 </style>

<?php

if (isset($_POST['log-out'], $_SESSION['userId'])) {
    $_SESSION['userId'] = null;
    echo "wylogowano <a href>logowanie</a>";
    exit();
}

if (isset($_POST["password"], $_POST["login"])) {
    $login = mysqli_real_escape_string(DB, trim($_POST["login"]));
    $password = mysqli_real_escape_string(DB, trim($_POST['password']));

    $foundUser = findUserByLogin($login);

    if (password_verify($password, $foundUser['password'])) {
        $_SESSION['userId'] = $foundUser['id_konta'];
    }
}
?>

<body>
    <?php
    $showLogInForm = true;
    if (isset($_SESSION['userId'])) {
        $foundUser = findUserByUserId($_SESSION['userId']);
        echo "jestes zalogowany jako: " . $foundUser['login'];
        $showLogInForm = false;
    }
    ?>

    <form action="log-in.php" method="post" <?php if (!$showLogInForm) echo "hidden" ?>>
        <input required type="text" name="login" placeholder='Nazwa'>
        <input required type="password" name="password" placeholder='Hasło'>
        <button type="submit">Zaloguj</button>
    </form>

    <a href="./register.php">rejestracja</a>

    <form action="log-in.php" method="post" <?php if (!isset($_SESSION['userId'])) echo "hidden" ?>>
        <button type="submit" name="log-out">wyloguj sie</button>
    </form>
</body>

</html>