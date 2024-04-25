<?php

session_start();
if (!isset($_SESSION['users']) or (!in_array(session_id(), $_SESSION['users']))) {
    header("Location: index.php");
    die();
}

require_once "db/db_connect.php";
$session_id = session_id();
$row = mysqli_fetch_assoc(mysqli_query($lnk, "SELECT name, balance FROM user WHERE session_id = '$session_id'"));




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Решение теста</title>

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

        #success_answer {
            margin: 0 auto;
            margin-top: 10px;
            width: 60%;
            text-align: center;
        }




    </style>

</head>
<body style="background-color: #000000">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<header>
    <a href="main.php" class="logo">TASKS</a>
    <nav>
        <ul>
            <li><a href="profile.php">👤 <?= $row['name'] ?></a></li>
            <li><a href="history.php" id="balance"> <?= $row['balance'] ?> </a></li>

        </ul>

    </nav>
</header>

<div class="alert alert-success" role="alert" id="success_answer" style="display: none">
    <h4 class="alert-heading">Отлично, вы ответили верно!</h4>
    <p>Зарабатываете вознаграждение, можете пройти этот тест еще раз но баллы уже не будут начислены ;(</p>
    <hr>
    <p class="mb-0">Теперь можно зайти в <a href="history.php" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">историю</a> и посмотреть все выполненные тесты.</p>
</div>


<?php
$name =  isset ($_GET['name']) ? $_GET['name'] : "";
$task = mysqli_fetch_assoc(mysqli_query($lnk, "SELECT * FROM quest WHERE name = '$name'"));


if (!isset($task['name'])) {
    echo '<img src="https://megaplast24.ru/wp-content/uploads/2021/08/404_atlanticbt_blog-1024x473.jpg" alt="">';
} else {
    require_once "controllers/Task.php";
    $structure = unserialize($task['structure']);

    echo '<input name="correct_answer" value="' . $structure->correct_answer . '" hidden>';
    echo '<input name="id" value=' . $task['id'] . ' hidden>';
    echo '<input name="cost" value=' . $task['cost'] . ' hidden>';

    echo '<div class="card">';
    echo '    <div class="card-header">';
    echo '        <div>👤' .  $task['user'] . '</div>';
    echo '        <div>💰' .  $task['cost'] . '</div>';
    echo '    </div>';
    echo '    <div class="card-body">';
    echo '        <h5 class="card-title">' . $task['name'] . '</h5>';

    echo '<div style="margin-top: 50px">';
    $i = 1;
    foreach ($structure->data  as $answer) {
        echo '<div class="form-check" style="margin-top: 10px;">';
        echo '<input class="form-check-input" type="radio" name="radio1" >';
        echo ' <label class="form-check-label" name="'.$i.'">'.$answer.'</label>';
        echo '</div>';
        $i++;
    }

    echo '</div>';
    echo '    </div>'; // card-body


    echo '<div ><span id="err" style="font-size: medium; color: #ae2012;"></span></div>';
    echo '<div ><span id="err" style="font-size: medium; color: #ae2012;"></span></div>';
    echo '<div class="d-grid gap-2">';
    echo '<button class="btn btn-warning" type="button" id="btn">Ответить</button>';
    echo '</div>';

    echo '</div>'; //card

}





?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="scripts/solve_task/solve_task.js"></script>
</body>
</html>
