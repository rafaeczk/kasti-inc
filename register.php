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
    <link rel="shortcut icon" href="/assets/img/zdj.png">
    <title>Rejestracja</title>
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
        }

        body {
            width: auto;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #000;
            color: #fff;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            
         
        
           
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
            background-color: #000;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
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
    </style>
</head>

<?php

if (isset($_POST["password"], $_POST["login"])) {
    $login = mysqli_real_escape_string(DB, trim($_POST["login"]));
    $hash = password_hash(mysqli_real_escape_string(DB, trim($_POST['password'])), PASSWORD_DEFAULT);

    $foundUser = findUserByLogin($login);
    if($foundUser)
        echo "Login zajęty";
    else {
        $isSuccess = addUser($login, $hash, null);
        echo $isSuccess ? "Zarejestrowano" : "coś zjebałeś";
    }
}

?>

<body>
    <?php
    $showLogInForm = true;
    if (isset($_SESSION['userId'])) {
        $foundUser = findUserByUserId($_SESSION['userId']);
        echo "Zalogowano użytkownika:  " . $foundUser['login'];
        $showLogInForm = false;
    }
    ?>

    <form action="register.php" method="post" <?php if (!$showLogInForm) echo "hidden" ?>>
        <input required type="text" name="login" placeholder='Nazwa'>
        <input required type="password" name="password" placeholder='Hasło'>
        <button type="submit">Zarejestruj się</button>
    </form>

    <a href="./log-in.php">Logowanie</a>
</body>

</html>