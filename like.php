<?php
include ("connect.php");

if (!isset($_SESSION["user_login"])) {
$user = "";
}
else {
$user = $_SESSION["user_login"];
}

if (isset($_POST['liked'])) {
	$postid = $_POST['postid'];
	$result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$postid");
	$row = mysqli_fetch_array($result);
	$n = $row['likes'];
    $postuser = $row['added_by'];

	$liked = mysqli_query($conn, "SELECT * FROM likes WHERE username='$user' AND postid=$postid");
	$likedrows = mysqli_num_rows($result);

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

	mysqli_query($conn, "DELETE FROM likes WHERE postid=$postid AND username='$user'");
	mysqli_query($conn, "UPDATE posts SET likes=$n-1 WHERE id=$postid");
	
	echo $n-1;
	exit();
}