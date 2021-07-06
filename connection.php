<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="lbwter_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect! ");
}

?>