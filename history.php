<?php

session_start();

if (!isset($_SESSION['users']) or (!in_array(session_id(), $_SESSION['users']))) {
    header("Location: index.php");
    die();
}

require_once "db/db_connect.php";
$session_id = session_id();
$row = mysqli_fetch_assoc(mysqli_query($lnk, "SELECT name, balance, history FROM user WHERE session_id = '$session_id'"));

$history = explode("->", $row['history']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Задания</title>

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

        .card {
            margin: 0 auto;
            margin-top: 30px;
            width: 60%;
            background-color: #212529;
            color: #fefae0;

        }


        .card-header {
            display: flex; /* Размещаем элементы в строку */
            justify-content: space-between; /* Распределяем пространство между элементами */
        }

        a {
            text-decoration: none;
            color: #fefae0;
        }



    </style>

</head>
<body style="background-color: #000000">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<header>
    <a href="main.php" class="logo">TASKS</a>
    <nav>
        <ul>
            <li><a href="#">👤 <?= $row['name'] ?></a></li>
            <li><a href="#"> <?= $row['balance'] ?> </a></li>

        </ul>

    </nav>
</header>


<?php


foreach ($history as $item) {
    echo '<div class="card">';
    echo '    <div class="card-header">';
    echo '        <div>👤' .  $item['user'] . '</div>';
    echo '        <div>💰' .  $item['cost'] . '</div>';
    echo '    </div>';
    echo '    <div class="card-body">';
    echo '        <a href=""><h5 class="card-title">' . $item['name'] . '</h5></a>';
    echo '    </div>';
    echo '</div>';
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="scripts/login/script_login.js"></script>
</body>
</html>
