<?php
$host="localhost";
$username="id16376105_admin";
$password='$SQ6[K-R5)}Qu-nY';
$dbname="id16376105_main";

$conn=mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_errno())
    echo "Connection could not be established...".mysqli_connect_error();
//else
    //echo "Successfully connected...";