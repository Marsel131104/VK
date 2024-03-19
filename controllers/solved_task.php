<?php
session_start();

if (!isset($_SESSION['users']) or (!in_array(session_id(), $_SESSION['users']))) {
    header("Location: index.php");
    die();
}

require_once "../db/db_connect.php";

$id = $_POST['id'];
$cost = $_POST['cost'];
$session_id = session_id();
$result = mysqli_fetch_assoc(mysqli_query($lnk, "SELECT name, balance, history FROM user WHERE session_id = '$session_id'"));
$username = $result['name'];
$name_task = mysqli_fetch_assoc(mysqli_query($lnk, "SELECT user FROM quest WHERE id = '$id'"));

$history = $result['history'] ? explode(",", $result['history']) : [];

if  ($name_task['user'] == $username)
    echo "user_create";
else {
    if (!empty($history) and in_array($id, $history))
        echo 'yes';
    else {
        $balance = $result['balance'] + $cost;
        $history[] = $id;
        $history = implode(",", $history);
        mysqli_query($lnk, "UPDATE user SET balance = '$balance', history = '$history' WHERE session_id = '$session_id'");
        echo 'no';
    }
}



