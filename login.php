<?php
session_start();

if (isset($_SESSION['users']) and (in_array(session_id(), $_SESSION['users']))) {
    header("Location: main.php");
    die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Форма авторизации</title>

    <style>
        body {
            justify-content: center;
            align-items: center;
        }

        .registration-form {
            background-color: #212529;
            margin: 0 auto;
            width: 30%;
            padding: 20px;
            color: #fefae0;
            margin-top: 80px;
            border-radius: 10px;
        }


        a {
            text-decoration: none;
        }

        .logo {
            font-size: 23px;
            font-weight: 900;

            color: #2b9348;
        }


    </style>
</head>
<body style="background-color: #000000">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<div class="registration-form">
    <p style="text-align: center;"><a href="index.php" class="logo">TASKS</a></p>

    <form method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Имя пользователя</label>
            <input type="text" class="form-control" placeholder="Ivanov Ivan" name="username">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="d-grid gap-2" style="margin-top: 30px">
            <button class="btn btn-outline-success" type="button" id="btn">Вход</button>
        </div>

        <div ><span id="err" style="font-size: small; color: #ae2012"></span></div>



        <p style="text-align: center; margin-top: 30px"><a href="reg.php" class="link-light">Регистрация</a></p>
    </form>


</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="scripts/login/script_login.js"></script>
</body>
</html>
