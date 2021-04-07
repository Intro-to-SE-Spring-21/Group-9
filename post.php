<?php
session_start();
include ("connect.php");

if (!isset($_SESSION["user_login"])) {
$user = "";
}
else {
$user = $_SESSION["user_login"];
}

if (isset($_POST['deleted'])) {
	$postid = $_POST['postid'];
	$result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$postid");
	$row = mysqli_fetch_array($result);
	$added_by = $row['added_by'];
	$user_posted_to = $row['user_posted_to'];

	$liked = mysqli_query($conn, "SELECT * FROM likes WHERE username='$user' AND postid=$postid");
	$likedrows = mysqli_num_rows($liked);

    if (in_array($user, array($added_by, $user_posted_to))) {
        mysqli_query($conn, "DELETE FROM posts WHERE id=$postid");
		mysqli_query($conn, "DELETE FROM likes WHERE postid=$postid");
		echo "1";
		exit();
    }

	else {
		exit();
	}
}

if (isset($_POST['liked'])) {
	$postid = $_POST['postid'];
	$result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$postid");
	$row = mysqli_fetch_array($result);
	$n = $row['likes'];

	$liked = mysqli_query($conn, "SELECT * FROM likes WHERE username='$user' AND postid=$postid");
	$likedrows = mysqli_num_rows($liked);

    if ($likedrows == 0) {
        mysqli_query($conn, "INSERT INTO likes (id, username, postid) VALUES (NULL, '$user', $postid)");
	    mysqli_query($conn, "UPDATE posts SET likes=$n+1 WHERE id=$postid");
		echo $n+1;
		exit();
    }

	else {
		echo $n;
		echo "You have already liked this post.";
		exit();
	}
}

if (isset($_POST['unliked'])) {
	$postid = $_POST['postid'];
	$result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$postid");
	$row = mysqli_fetch_array($result);
	$n = $row['likes'];

	$liked = mysqli_query($conn, "SELECT * FROM likes WHERE username='$user' AND postid=$postid");
	$likedrows = mysqli_num_rows($liked);

    if ($likedrows == 0) {
        echo $n;
		echo "You have not liked this post.";
		exit();
    }

	else {
		mysqli_query($conn, "DELETE FROM likes WHERE postid=$postid AND username='$user'");
		mysqli_query($conn, "UPDATE posts SET likes=$n-1 WHERE id=$postid");
		echo $n-1;
		exit();
		
	}
}