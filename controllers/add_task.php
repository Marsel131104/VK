<?php
session_start();

if (!isset($_SESSION['users']) or (!in_array(session_id(), $_SESSION['users']))) {
    header("Location: index.php");
    die();
}

require_once "../db/db_connect.php";
require_once "Task.php";

$data = $_POST;
$correct_answer = array_pop($data);
$cost = (int) array_pop($data);
array_pop($data);
$name = array_pop($data);
$data = array_values($data);




$task = serialize(new Task($name, $data, $correct_answer, $cost));

$row = mysqli_fetch_assoc(mysqli_query($lnk, "SELECT name FROM quest WHERE name = '$name'"));
if ($row['name'])
    echo "Такой вопрос уже есть";
else {
    $session_id = session_id();
    $row = mysqli_fetch_assoc(mysqli_query($lnk, "SELECT name FROM user WHERE session_id = '$session_id'"));
    $user = $row['name'];
    mysqli_query($lnk, "INSERT INTO quest (name, cost, structure, user) VALUES ('$name','$cost', '$task', '$user')");

}



