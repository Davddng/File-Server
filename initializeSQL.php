<?php

$host = "localhost";
$database = "fileserver";
$user = "webuser";
$password = "296001001";

$connection = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    echo("Connect failed: " . mysqli_connect_error());
    exit();
}

?>
