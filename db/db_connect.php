<?php

$lnk = mysqli_connect("localhost", "root", "", "vk") or die('Cannot connect to server');
mysqli_select_db($lnk, "vk") or die('Cannot open database');