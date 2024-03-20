<?php
session_start();


$username = $_POST['username'];
$password = $_POST['password'];
$double_password = $_POST['double_password'];


if ((!$username) or (!$password) or (!$double_password)) {
    echo "accuracy";
    die();
}


else {

    function query_select()
    {
        require "../db/db_connect.php";
        $result = mysqli_query($lnk, "SELECT * FROM user");
        $items = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($items, $row);
        }

        return $items;
    }

    function add($username, $password)
    {
        require "../db/db_connect.php";
        mysqli_query($lnk, "INSERT INTO user (name, password, balance) VALUES ('$username', '$password', 0)");

    }


    $users = query_select();
    foreach ($users as $user) {
        if ($username == $user['name']) {
            echo "person";
            die();
        }
    }

    if ($password != $double_password) {
        echo "double_password";
        die();
    }



    $str_low = "qwertyuiopasdfghjklzxcvbnm";
    $str_high = "QWERTYUIOPASDFGHJKLZXCVBNM";
    $str_sybmols = "!#$%&\'()*+,-./:;<=>?@[\]^_`{|}~";
    $flag_low = false;
    $flag_high = false;
    $flag_symbols = false;


    for ($i = 0; $i < strlen($password); $i++) {
        if (($flag_low) and ($flag_high) and ($flag_symbols)) {
            break;
        }
        else if (strpos($str_low, $password[$i]) !== false)
            $flag_low = true;
        else if (strpos($str_high, $password[$i]) !== false)
            $flag_high = true;
        else if (strpos($str_sybmols, $password[$i]) !== false)
            $flag_symbols = true;
    }



    if (($flag_low) and ($flag_high) and ($flag_symbols)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        add($username, $password);

        echo "ok";
        die();
    }

    echo "password";
    die();

}











