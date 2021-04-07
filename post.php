<?php
session_start();
include ("connect.php");

if (!isset($_SESSION["user_login"])) {
$user = "";
}
else {
$user = $_SESSION["user_login"];
}

if (isset($_POST['posted'])) {
	if ($user) {
		$posttext = $_POST['posttext'];
		$date_added = date("Y-m-d");
		$added_by = $user;
		$user_posted_to = $_POST['username'];

		if ($posttext) {
			$sqlCommand = "INSERT INTO posts VALUES(NULL, '$posttext', '$date_added', '$added_by', '$user_posted_to', 0)";
			$query = mysqli_query($conn, $sqlCommand) or die (mysqli_error($conn));
			exit();
		}
		else {
			echo "2";
			exit();
		}
	}
	else {
		echo "1";
		exit();
	}
}

if (isset($_POST['deleted'])) {
	if ($user) {
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
	else {
		exit();
	}
}

if (isset($_POST['liked'])) {
	if ($user) {
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
			exit();
		}
	}
	else {
		exit();
	}
}

if (isset($_POST['unliked'])) {
	if ($user) {
		$postid = $_POST['postid'];
		$result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$postid");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		$liked = mysqli_query($conn, "SELECT * FROM likes WHERE username='$user' AND postid=$postid");
		$likedrows = mysqli_num_rows($liked);

		if ($likedrows == 0) {
			exit();
		}
		else {
			mysqli_query($conn, "DELETE FROM likes WHERE postid=$postid AND username='$user'");
			mysqli_query($conn, "UPDATE posts SET likes=$n-1 WHERE id=$postid");
			echo $n-1;
			exit();
			
		}
	}
}