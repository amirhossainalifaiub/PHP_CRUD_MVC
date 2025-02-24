<?php
$hostName = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "CRUD";


$con = new mysqli($hostName, $dbUser, $dbPass, $dbName);

if(!$con)
{
    die("Something Wrong!");
}
?>