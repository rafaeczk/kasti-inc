<?php
session_start();
require("db/users/addUser.php");
require("db/users/findUserByLogin.php");
require("db/users/findUserByUserId.php");
require_once("db/connectDB.php");
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

if (isset($_POST["password"], $_POST["login"])) {
    $login = mysqli_real_escape_string(DB, trim($_POST["login"]));
    $hash = password_hash(mysqli_real_escape_string(DB, trim($_POST['password'])), PASSWORD_DEFAULT);

    $foundUser = findUserByLogin($login);
    if($foundUser)
        echo "login zajęty";
    else {
        $isSuccess = addUser($login, $hash, null);
        echo $isSuccess ? "zarejestrowano" : "coś zjebałeś";
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

    <form action="register.php" method="post" <?php if (!$showLogInForm) echo "hidden" ?>>
        <input required type="text" name="login" placeholder='Nazwa'>
        <input required type="password" name="password" placeholder='Hasło'>
        <button type="submit">zarejestruj sie</button>
    </form>

    <a href="./log-in.php">logowanie</a>
</body>

</html>