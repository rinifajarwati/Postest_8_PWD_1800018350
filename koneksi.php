<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "akademik";

$con = @mysqli_connect($host, $username, $password, $db);

if(!$con){
    echo "Error:".mysqli_connect_error();
    exit();
}
?>