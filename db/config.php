<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "123123";
$database = "mydb";

$con = mysqli_connect($hostname,$username,$password,$database);

//Check connection
if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: ". mysqli_connect_errno();
    }
mysqli_select_db($con, $database);

?>