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

 

* {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #333;
            color: #fff;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            color: #000;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            color: #bbb;
        }

        button[name="log-out"] {
            background-color: #d9534f;
        }

        .register-panel {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            color: #000;
        }



  
 </style>

<?php

if (isset($_POST['log-out'], $_SESSION['userId'])) {
    $_SESSION['userId'] = null;
    echo "wylogowano <a href>Logowanie</a>";
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

    <a href="./register.php" class="regi">Rejestracja</a> 

    <form action="log-in.php" method="post" <?php if (!isset($_SESSION['userId'])) echo "hidden" ?>>
        <button type="submit" name="log-out">Wyloguj sie</button>
    </form>
</body>

</html>