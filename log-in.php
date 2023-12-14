<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        h1{
            justify-content: center;
            font-size: 50px;
            color: whitesmoke;
        }
        body {
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
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
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

<body>
    <h1>KASTI INDUSTRIES</h1>
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
    </main>
</body>

</html>
