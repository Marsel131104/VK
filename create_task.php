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
    <title>Создание задания</title>

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

    </style>

</head>
<body style="background-color: #000000">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<header>
    <a href="main.php" class="logo">TASKS</a>
    <nav>
        <ul>
            <li><a href="profile.php">👤 <?= $row['name'] ?></a></li>
            <li><a href="#"> <?= $row['balance'] ?> </a></li>

        </ul>

    </nav>
</header>


<div style="margin: 0 auto; margin-top: 20px; width: 50%; color: #d1ccc0">
    <form style="">
        <div class="mb-3">
        <label class="form-label">Введите вопрос:</label>
        <textarea class="form-control"  rows="3" name="name"></textarea>
        </div>


        <label class="form-label">Введите варианты ответов и укажите верный:</label>
        <div class="btn-group btn-group-sm float-end" role="group">
            <button type="button" class="btn btn-danger" id="decrease">-</button>
            <button type="button" class="btn btn-success" id="increase">+</button>
        </div>



        <div class="form-check" style="margin-top: 30px;">
            <input class="form-check-input" type="radio" name="radio1" >
            <input class="form-control form-control-sm" type="text" name="1">
        </div>

        <div class="form-check" style="margin-top: 10px;">
            <input class="form-check-input" type="radio" name="radio1">
            <input class="form-control form-control-sm" type="text" name="2">
        </div>

        <div class="mb-3" style="margin-top: 30px;">
            <label class="form-label">Введите количество начисляемых баллов:</label>
            <input class="form-control form-control-sm" type="number"  min="1" max="10" placeholder="1-10" name="cost">
        </div>



        <div ><span id="err" style="font-size: medium; color: #ae2012"></span></div>


        <div class="d-grid gap-2" style="margin: 0 auto; margin-top: 30px;">
            <button class="btn btn-warning" type="button" id="create">Создать</button>
        </div>


    </form>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="scripts/create_task/create_task.js"></script>
</body>
</html>
