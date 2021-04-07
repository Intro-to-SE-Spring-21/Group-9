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
/*
$post = @$_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$added_by = $user;
$user_posted_to = $username;

$sqlCommand = "INSERT INTO posts VALUES(NULL, '$post', '$date_added', '$added_by', '$user_posted_to', 0)";
$query = mysqli_query($conn, $sqlCommand) or die (mysqli_error($conn));
}
else {
	echo "You must enter something in the post field before you can sent it.";
}*/
?>
<div class="profileTitle">
	<p><?php echo "$username"; ?></p>
</div>

<div class="postForm">
	<textarea id="postSubmitArea" name="post" rows="4" cols="58"></textarea>
	<input id="postSubmitButton" type="submit" name="send" value="Post" data-id="<?php echo $username; ?>"/>
</div>
</div>
<div class="profilePosts">
<?php
$getposts = mysqli_query($conn, "SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysqli_error($conn));
?>

<?php while ($row = mysqli_fetch_assoc($getposts)) {
	$rowid = $row['id'];
	$body = $row['body'];
	$date_added = $row['date_added'];
	$added_by = $row['added_by'];
	$user_posted_to = $row['user_posted_to'];
	?>

<div class="post">
	<?php echo "Posted by: <a href='$added_by'>$added_by</a> on $date_added"; ?>

	<div style="padding: 2px; margin-top: 5px;">
		<span class="delete" data-id="<?php echo $rowid; ?>" style="margin-right: 20px;">Delete</span>
		<span class="like" data-id="<?php echo $rowid; ?>">Like</span> 
		<span class="unlike" data-id="<?php echo $rowid; ?>">Dislike</span>

		<span class="likes_count" style="background-color: #eff5f9; color: #000; margin-left: 50px;"><?php echo $row['likes']; ?> likes</span>
		<div  style="padding-top: 10px;">
			<hr />
			<br>
			<?php echo $body ?> 
			<br>
		</div>
		<br><br>
		<hr />
	</div>
</div>
<?php } ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		
		// when the user clicks on post
		$('#postSubmitButton').on('click', function(){
			var posttext = $('#postSubmitArea').val();
			var username = $(this).data('id');

			$.ajax({
				url: 'post.php',
				type: 'post',
				data: {
					'posted': 1,
					'posttext': posttext,
					'username': username
				},
				success: function(response){
					if (response == "1") {
						alert("You cannot post without being logged in.");
					}
					else if (response == "2") {
						alert("You cannot post without filling in the text area.");
					}
					else {
						location.reload();
					}				
				}
			});
		});

		// when the user clicks on delete
		$('.delete').on('click', function(){
			var postid = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'post.php',
				type: 'post',
				data: {
					'deleted': 1,
					'postid': postid
				},
				success: function(response){
					if (response) {
						$post.parent().parent().remove();
					}
					else {
						alert("You cannot delete this post.");
					}				
				}
			});
		});

		// when the user clicks on like
		$('.like').on('click', function(){
			var postid = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'post.php',
				type: 'post',
				data: {
					'liked': 1,
					'postid': postid
				},
				success: function(response){
					if (response) {
						$post.parent().find('span.likes_count').html(response + " likes");
					}
					else {
						alert("You cannot like this post.");
					}
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var postid = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'post.php',
				type: 'post',
				data: {
					'unliked': 1,
					'postid': postid
				},
				success: function(response){
					if (response) {
						$post.parent().find('span.likes_count').html(response + " likes");
					}
					else {
						alert("You cannot dislike this post.");
					}
				}
			});
		});
	});
</script>
</body>
</html>