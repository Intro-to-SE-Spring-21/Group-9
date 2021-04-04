<?php
include ("header.php");

if (isset($_GET['u'])) {
	$username = mysqli_real_escape_string($conn, $_GET['u']);
	if (ctype_alnum($username)) {
 	//check user exists
	$check = mysqli_query($conn, "SELECT username, first_name FROM users WHERE username='$username'");
	if (mysqli_num_rows($check)===1) {
	$get = mysqli_fetch_assoc($check);
	$username = $get['username'];
	$firstname = $get['first_name'];	
	}
	else
	{
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";	
	exit();
	}
	}
}

$post = @$_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$added_by = $user;
$user_posted_to = $username;

$sqlCommand = "INSERT INTO posts VALUES(NULL, '$post', '$date_added', '$added_by', '$user_posted_to')";
$query = mysqli_query($conn, $sqlCommand) or die (mysqli_error($conn));
}
else {
	echo "You must enter something in the post field before you can sent it.";
}
?>

<h2>Profile page for: <?php echo "$username"; ?></h2>
<h2>First name: <?php echo "$firstname"; ?></h2>
<div id="status">
</div>
<div class="postForm">
	<form action="" method="POST">
	<textarea id="postSubmitArea" name="post" rows="4" cols="58"></textarea>
	<input id="postSubmitButton" type="submit" name="send"  value="Post"/>
</form>
</div>
<div class="profilePosts">
<?php
$getposts = mysqli_query($conn, "SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysqli_error($conn));
while ($row = mysqli_fetch_assoc($getposts)) {
	$id = $row['id'];
	$body = $row['body'];
	$date_added = $row['date_added'];
	$added_by = $row['added_by'];
	$user_posted_to = $row['user_posted_to'];
	$likes = 0;
	echo "
	<div class='posted_by'>
	Posted by:
							<a href='$added_by'>$added_by</a> on $date_added &emsp; Likes: $likes</div>
							<div>
								<form action='' method='POST' style='margin-left: 400px;'>
									<input type='submit' name='like' value='Like' style='background-color: #00B9ED; color: #000;'>
									<input type='submit' name='dislike' value='Disike' style='background-color: #00B9ED; color: #000;'>
									<input type='submit' name='delete_post' value='Delete' style='margin-left: 50px; background-color: #CCC; color: #000;'>
								</form>
							</div>
							
							<br>
							<div  style='max-width: 600px; font-size: 16px;'>
							$body<br>
							</div>
							<br><br>
							<hr />	";
}
if (isset($_POST['delete_post'])) {
	if ($user == )
    $sqlDeleteCommand = mysqli_query($conn, "DELETE FROM posts WHERE id='$id'");
}
?>
</div>