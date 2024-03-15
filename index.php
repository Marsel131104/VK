<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Практика по решению тестов</title>

    <style>
        header a {
            font-family: sans-serif;
            text-decoration: none;
            height: 70%;
        }

        header li {
            list-style: none;
        }
        header {

            top: 0;
            left: 0;
            right: 0;
            background-color: #3d3d3d;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 5%;
        }

        .logo {
            font-size: 23px;
            font-weight: 900;
            color: #2b9348;

        }

        header nav ul li {
            position: relative;
            float: left;
        }

        header nav ul li a {

            padding: 20px;
            color: #d1ccc0;
            font-size: 15px;
            display: block;
        }

        header nav ul li a:hover{
            background-color: #edede9;
            color: #000000;
        }

        img {
            width: 100%;
            display: block;
            opacity: 20%;
        }

        .description {
            color: #fefae0;

        }

        .container {
            position: relative;
            text-align: center;
        }

        .content {
            position: absolute;
            top: 30%;
            left: 50%; /* Размещаем контент по горизонтали в центре контейнера */
            transform: translate(-50%, -50%); /* Центрируем контент относительно центра контейнера */

        }

        button {
            margin-top: 50px;
            font-weight: 900;
        }




    </style>



</head>


<body style="background-color: #000000">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<header>
    <a href="index.php" class="logo">TASKS</a>
    <nav>
        <ul>
            <li><a href="login.php">Вход</a></li>
            <li><a href="reg.php">Регистрация</a></li>

        </ul>

    </nav>
</header>





<div class="container">
    <img src="https://asp-edo.ru/upload/medialibrary/91b/plan2.png" alt="">
    <div class="content">
        <h1>
        <span class="description">
            Проходите тесты
        </span>
        </h1>
        <h1>
        <span class="description">
            Получайте баллы
        </span>
        </h1>
        <h1>
        <span class="description">
            Cоздавайте свои задания
        </span>
        </h1>

        <a href="reg.php"><button type="button" class="btn btn-success btn-lg">Начать работу</button></a>
    </div>
</div>





</body>
</html>
