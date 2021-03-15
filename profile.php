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
?>

<h2>Profile page for: <?php echo "$username"; ?></h2>
<h2>First name: <?php echo "$firstname"; ?></h2>

<div class="postForm">
	<textarea id="postSubmitArea" name="post" rows="4" cols="58"></textarea>
	<input id="postSubmitButton" type="submit" name="send" onclick="javascript:sendpost()" value="Post"/>
</div>
<div id="status">
</div>