<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];


if ((!$username) or (!$password)) {
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


    function update_session_id($username)
    {
        require "../db/db_connect.php";
        $session_id = session_id();

        mysqli_query($lnk, "UPDATE users SET session_id = '' WHERE session_id = '$session_id'");
        mysqli_query($lnk, "UPDATE users SET session_id = '$session_id' WHERE name = '$username'");
    }

    function add_session_id($username)
    {
        require "../db/db_connect.php";
        $session_id = session_id();
        mysqli_query($lnk, "UPDATE users SET session_id = '$session_id' WHERE name = '$username'");
    }



    $users = query_select();
    foreach ($users as $user) {
        if ((($username == $user['name']) and (password_verify($password, $user["password"])))) {

            if (isset($_SESSION['users']) and (in_array(session_id(), $_SESSION['users'])))
                update_session_id($username);
            else {
                $_SESSION['users'][] = session_id();
                add_session_id($username);
            }

            echo "ok";
            die();
        }
    }

    echo "person-password";
    die();

}











