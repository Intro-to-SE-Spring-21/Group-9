<?php
session_start();
include ("connect.php");

if (!isset($_SESSION["user_login"])) {
$user = "";
}
else {
$user = $_SESSION["user_login"];
}

if (isset($_POST['follow'])) {
	if ($user) {
		$followed = $_POST['followed'];
        if ($user == $followed) {
            echo "2";
            exit();
        }
        else {
            $followrows = mysqli_query($conn, "SELECT * FROM follows WHERE follower='$user' AND followed='$followed'");
            $followbool = mysqli_num_rows($followrows);
    
            if ($followbool) {
                mysqli_query($conn, "DELETE FROM follows WHERE follower='$user' AND followed='$followed'");
            }
            else {
                mysqli_query($conn, "INSERT INTO follows (id, follower, followed) VALUES (NULL, '$user', '$followed')");
            }    
        }
	}
	else {
		echo "1";
		exit();
	}
}