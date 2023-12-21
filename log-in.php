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
    <title>Strona guwna</title>
    <link rel="shortcut icon" href="/assets/img/zdj.png">
    <style>
         * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        h1 {
            justify-content: center;
            font-size: 50px;
            color: whitesmoke;
            margin-left: 20px;
        }

        body {
            width: auto;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: flex-start; 
            height: 100vh;
            background-color: #000;
            color: #fff;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

            border: 10px solid;
            border-image: linear-gradient(45deg, gold, deeppink) 1;
            clip-path: inset(0px round 10px);
            animation: huerotate 6s infinite linear;
            filter: hue-rotate(360deg);
        }

        @keyframes huerotate {
            0% {
                filter: hue-rotate(0deg);
            }

            100% {
                filter: hue-rotate(360deg);
            }
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-left: 20px; 
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
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
            border: 1px solid #000;
            border-radius: 4px;
        }

        button {
            background-color: #000;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        button:hover {
            background-color: #333;
        }

        a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: black;
        }

        a:hover {
            color: #ccc;
        }

        button[name="log-out"] {
            background-color: #d9534f;
        }

        .register-panel {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
            color: #000;
        }

        .bok {
            justify-content: flex-start; 
            margin-left: 20px; 
        }

        .regpal {
            display: flex;
            align-items: center;
            justify-content: flex-start; 
            margin-left: 20px;
        }
    </style>
</head>
<div class="regpal">
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
        header("location: dashboard-start.php");
    }
}
?>

<body>
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
        <div class="bok">
          
            <br>
        </div>
        <?php
        $showLogInForm = true;
        if (isset($_SESSION['userId'])) {
            $foundUser = findUserByUserId($_SESSION['userId']);
            echo "Jesteś zalogowany jako: " . $foundUser['login'];
            $showLogInForm = false;
        }
        ?>

        <main>
            <form action="log-in.php" method="post" <?php if (!$showLogInForm) ?>>
                <input required type="text" name="login" placeholder='Nazwa'>
                <input required type="password" name="password" placeholder='Hasło'>
                <button type="submit">Zaloguj</button>
            </form>

            <form action="log-in.php" method="post" <?php if (!isset($_SESSION['userId'])) echo "hidden" ?>>
                <button type="submit" name="log-out">Wyloguj się</button>
            </form>

            <div class="register-panel">
                <p>Nie masz konta? </p>
                <a href="./register.php"><b>Zarejestruj się</b></a>
            </div>
</div>
</main>
</body>

</html>