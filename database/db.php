<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "security";

$conn = mysqli_connect($host,$user,$pass,$database);

if(!$conn)
{
    echo "Some Error Occured";
    echo "\n".mysql_errno;
}
error_reporting(0);


?>